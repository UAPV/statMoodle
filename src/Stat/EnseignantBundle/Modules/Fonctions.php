<?php
/**
 * Created by PhpStorm.
 * User: fanny
 * Date: 11/02/14
 * Time: 15:03
 */

namespace Stat\EnseignantBundle\Modules;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Fonctions {

   protected $em;
   protected $container;

   public function __construct(Container $service_container)
   {
      $this->container = $service_container;
   }

   public function setEntityManager(ObjectManager $em)
   {
       $this->em = $em;
   }

    /**
     * @param $username de l'enseignant
     *
     * Retourne tous les cours d'un enseignant éditeur avec le username $username
     * Avec un tableau pour chaque indicateur
     */
   public function getCourseByUser($username)
   {
     $query = $this->em->createQuery(
           'SELECT DISTINCT course.id, course.fullname, course.idnumber
                FROM StatEnseignantBundle:MdlUser user, StatEnseignantBundle:MdlRoleAssignments rass, StatEnseignantBundle:MdlContext cont, StatEnseignantBundle:MdlCourse course, StatEnseignantBundle:MdlRole role
                WHERE user.id = rass.userid
                AND rass.contextid = cont.id
                AND rass.roleid = role.id
                AND cont.instanceid = course.id
                AND role.shortname = :shortname
                AND user.username = :username
                AND course.visible = 1'
       )->setParameters(array('shortname' => 'editingteacher', 'username' => $username));

     $courses = $query->getResult();

     $data = array();
     $tmp = array();
     foreach($courses as $course)
     {
       $retour = $this->getDataCoursTice($course['id']);
       $actif = $this->getDataCoursActif($course['id']);
       $tmp[key($retour)] = $retour[key($retour)];
       $tmp[key($actif)] = $actif[key($actif)];
       $description = $this->getNbStudent($course['id']).' étudiants inscrits<br/> '.$this->getNbTeacher($course['id']).' enseignants inscrits<br/>'.$this->getNbSection($course['id']).' sections ouvertes';
       $data[$course['id']] = array('fullname' => $course['fullname'], 'donnees' => $tmp, 'desc' => $description);
     }

     return $data;
   }

    /**
     * @param $idCours
     * @return array
     *
     * Requetes dans Moodle pour récupérer les valeurs des critères "tice"
     * Retourne un tableau de valeurs avec les axes et values du radar
     */
    public function getDataCoursTice($idCours)
    {
       $titre = 'Utilisation TICE';
       $nb = array();

       $nb['ressources'] = $this->getNbResource($idCours) + $this->getNbUrlResource($idCours);
       $nb['ressources_struct'] = $this->getNbGlossary($idCours) + $this->getNbLabel($idCours);
       $nb['rendus'] = $this->getNbAssignment($idCours) + $this->getNbLesson($idCours) + $this->getNbWorkshop($idCours);
       $nb['sujet_forum'] = $this->getNbSubjectForum($idCours);
       $nb['inscription'] = $this->getNbStudent($idCours);

       return array($titre => $nb);
    }

    /**
     * @param $idCours
     * @return array
     *
     * Requetes dans Moodle pour récupérer les valeurs des critères "cours actif"
     * Retourne un tableau de valeurs avec les axes et values du radar
     */
    public function getDataCoursActif($idCours)
    {
        $titre = 'Cours actif';
        $nb = array();

        $nb['connexion'] = $this->getPercentageConnection($idCours);
        $nb['consult_resources'] = $this->getActiveResource($idCours);
        $nb['feedback'] = $this->getPercentageFeedback($idCours);
        $nb['rendu'] = ($this->getPercentageAssignment($idCours) + $this->getPercentageNotHiddenAssignment($idCours))/2;
        $nb['communication'] = $this->getAvgPost($idCours) + $this->getNbStudentForum($idCours);

        return array($titre => $nb);
    }

    public function getDataGlobalStudent($idCours)
    {
        $nb = array();

        $nb['connexion'] = $this->getConnectionPerStudent($idCours);
        $nb['connexion_ressource'] = $this->getGrapheConnectionResourcePerStudent($idCours);

        return array($nb);
    }

    /**
     * @param $nameStudent
     * @param $idCours
     *
     * Requetes dans Moodle pour récupérer les valeurs concernant un seul étudiant
     * Retourne un tableau de valeurs avec les fonctions données dans $nb
     */
    public function getDataDetailsStudent($nameStudent, $idCours)
    {
        $titre = 'Détail de l\'étudiant '.$nameStudent;
        $nb = array();

        $nb['connexion'] = $this->getPercentageConnection($idCours);

        return array($titre => $nb);
    }

    /**
     * @param $idCours
     *
     * Retourne la moyenne d'utilisateurs
     * se connectant chaque semaine au cours
     */
    protected function getPercentageConnection($idCours)
    {
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy FROM (
                            SELECT count(*) AS c
                            FROM mdl_log
                            WHERE mdl_log.course = ".$idCours."
                            GROUP BY weekofyear( time ) , userid
                            )cnt");
        $statement->execute();
        $results = $statement->fetchAll();

        return $results[0]['moy'];
    }

    /**
     * @param $idCours
     *
     * Retourne la moyenne du pourcentage d'utilisateurs
     * se connectant chaque semaine au cours
     */
    protected function getActiveResourcePerStudent($idCours)
    {
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy, userid, prenom FROM (
                            SELECT count(mdl_log.id) AS c, mdl_user.id as userid, CONCAT(lastname,' ',firstname) as prenom
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_log ON mdl_log.userid = mdl_user.id
                            AND mdl_log.course = mdl_course.id
                            WHERE mdl_course.id = ".$idCours."
                            AND roleid in (5)
                            GROUP BY weekofyear( time ) , userid
                            )cnt GROUP BY userid ORDER BY prenom ASC");
        $statement->execute();
        $results = $statement->fetchAll();

        $autres = $this->getPercentageConnection($idCours);

        $data = array();
        foreach($results as $r)
            $data[$r['prenom']] = round($autres*$r['moy']/100,1);

        return $data;
    }

    /**
     * @param $idCours
     * @return mixed
     *
     * Retourne le nombre moyen de consultation de cours
     */
    protected function getActiveResource($idCours)
    {
        $action = 'view';
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy FROM (
                            SELECT count(*) AS c
                            FROM mdl_log
                            INNER JOIN mdl_course_modules ON mdl_course_modules.id = mdl_log.cmid
                            INNER JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                            INNER JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                            WHERE mdl_log.course = ".$idCours."
                            AND mdl_modules.id IN (15,18)
                            AND mdl_resource.display != 6
                            AND action = '".$action."'
                            GROUP BY userid
                            )cnt");
        $statement->execute();
        $results = $statement->fetchAll();

        return $results[0]['moy'];
    }

    /**
     * @param $idCours
     * @param $idResource
     * @return mixed
     *
     * Retourne le nombre moyen de consultation de cours pour une ressource donnée
     */
    protected function getActiveResourceByR($idCours)
    {
        $action = 'view';
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy, cmid, name FROM (
                            SELECT count(*) AS c, cmid, mdl_resource.name as name
                            FROM mdl_log
                            INNER JOIN mdl_course_modules ON mdl_course_modules.id = mdl_log.cmid
                            INNER JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                            INNER JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                            WHERE mdl_log.course = ".$idCours."
                            AND mdl_modules.id IN (15,18)
                            AND mdl_resource.display != 6
                            AND action = '".$action."'
                            AND mdl_log.module = 'resource'
                            GROUP BY userid, cmid
                            )cnt GROUP BY cmid");
        $statement->execute();
        $results = $statement->fetchAll();

        return $results;
    }

    protected function getConnectionResourcePerStudent($idCours)
    {
        $action = 'view';
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy,userid, prenom FROM (
                            SELECT count(mdl_log.id) AS c, mdl_log.userid as userid, CONCAT(lastname,' ',firstname) as prenom
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_course_modules ON mdl_course_modules.course = mdl_course.id
                            LEFT JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                            LEFT JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                            LEFT JOIN mdl_log ON mdl_log.course=mdl_course.id AND mdl_log.userid=mdl_user.id
                            WHERE mdl_course.id = ".$idCours."
                            AND mdl_modules.id IN (15,18)
                            AND mdl_resource.display != 6
                            AND action = '".$action."'
                            AND roleid IN (5)
                            GROUP BY userid
                            )cnt GROUP BY userid  ORDER BY prenom ASC");
        $statement->execute();
        $results = $statement->fetchAll();

        $autres = $this->getActiveResource($idCours);

        $data = array();
        foreach($results as $r)
            $data[$r['prenom']] = round($autres*$r['moy']/100,1);

        return $data;
    }

    /**
     * @param $idCours
     * @return float|int
     *
     * Retourne le pourcentage de devoirs rendus par rapport au nombre d'inscrits (* le nombre de dépôt)
     */
    protected function getPercentageAssignment($idCours)
    {
        $query = $this->em->createQuery(
            'SELECT COUNT(AsS.id) FROM StatEnseignantBundle:MdlAssignmentSubmissions AsS
              INNER JOIN StatEnseignantBundle:MdlAssignment A WITH AsS.assignment = A.id
              WHERE A.course = :course
            '
        )->setParameter('course', $idCours);
        $nbRendus = $query->getSingleResult();
        $nbDepot = $this->getNbAssignmentDepot($idCours);

        if($nbRendus[1] == 0)
            return 0;
        else
        {
            $nbInscrit = $this->getNbStudent($idCours);
            return ($nbInscrit*$nbDepot/$nbRendus[1])*100;
        }
    }

    /**
     * @param $idCours
     * @return mixed
     *
     * Retourne le nombre de dépôts de devoirs dans le cours
     */
    protected function getNbAssignmentDepot($idCours)
    {
        $query = $this->em->createQuery(
            'SELECT COUNT(A.id) FROM StatEnseignantBundle:MdlAssignment A
              WHERE A.course = :course
            '
        )->setParameter('course', $idCours);
        $nbDevoirs = $query->getSingleResult();

        return $nbDevoirs[1];
    }

    /**
     * @param $idCours
     *
     * Retourne le taux de réponses par rapport au nombre d'inscrits
     */
    protected function getPercentageFeedback($idCours)
    {
        $query = $this->em->createQuery(
            ' SELECT COUNT(FC.userid) FROM StatEnseignantBundle:MdlFeedbackCompleted FC
              INNER JOIN StatEnseignantBundle:MdlFeedback F WITH F.id = FC.feedback
              WHERE F.course = :cours
            ')->setParameter('cours', $idCours);

        $nbReponses = $query->getSingleResult();

        if($nbReponses[1] == 0)
            return 0;
        else
        {
            $nbInscrit = $this->getNbStudent($idCours);
            return ($nbInscrit/$nbReponses[1])*100;
        }
    }

    public function getDataCoursTiceDetails($idCours)
    {
        $titre = 'Utilisation TICE';
        $retour = array();

        $retour[] = $this->getGraphResources($idCours);
        $retour[] = $this->getGraphResourcesStruct($idCours);
        $retour[] = $this->getGraphRendu($idCours);
        $retour[] = $this->getGraphInscription($idCours);
        $retour[] = $this->getGraphHiddenResource($idCours);

        return $retour;
    }

    public function getDataCoursActifDetails($idCours)
    {
        $titre = 'Cours actif';
        $retour = array();

        $retour[] = $this->getGraphConnexionStudent($idCours);
        $retour[] = $this->getGraphConnexionResource($idCours);
        $retour[] = $this->getGraphForum($idCours);
        $retour[] = $this->getGraphAssignmentPerWeek($idCours);
        $retour[] = $this->getGraphHiddenResource($idCours);

        return $retour;
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de glossaire du cours
     */
    protected function getNbGlossary($course)
    {
       $query = $this->em->createQuery(
               'SELECT COUNT(G.id) FROM StatEnseignantBundle:MdlGlossary G WHERE G.course = :course'
           )->setParameter('course', $course);
       $glossaire = $query->getSingleResult();

       return $glossaire[1];
    }

    /**
     * @param $course
     *
     * Retourne le nombre d'étiquettes dans un cours
     */
    protected function getNbLabel($course)
    {
        $query = $this->em->createQuery(
                'SELECT COUNT(L.id) FROM StatEnseignantBundle:MdlLabel L WHERE L.course = :course'
            )->setParameter('course', $course);
        $etiquette = $query->getSingleResult();

        return $etiquette[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de ressources (fichiers, pdf) dans un cours
     */
    protected function getNbResource($course)
    {
        $query = $this->em->createQuery(
            'SELECT COUNT( R.id ) FROM StatEnseignantBundle:MdlResource R WHERE R.course = :course AND R.display != 6'
        )->setParameter('course', $course);
        $ressource = $query->getSingleResult();

        return $ressource[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de liens que contient le cours
     */
    protected function getNbUrlResource($course)
    {
        $query = $this->em->createQuery(
            'SELECT COUNT( U.id ) FROM StatEnseignantBundle:MdlUrl U WHERE U.course = :course AND U.display != 6'
        )->setParameter('course', $course);
        $url = $query->getSingleResult();

        return $url[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de devoirs (depot ayant au moins un rendu)
     */
    protected function getNbAssignment($course)
    {
        $query = $this->em->createQuery(
            'SELECT COUNT(DISTINCT A.id) FROM StatEnseignantBundle:MdlAssignment A
                INNER JOIN StatEnseignantBundle:MdlAssignmentSubmissions S WITH A.id = S.assignment
                WHERE A.course = :course AND S.numfiles > 0'
        )->setParameter('course', $course);
        $nbDevoirs = $query->getSingleResult();

        return $nbDevoirs[1];
    }

    protected function getPercentageNotHiddenAssignment($idCours)
    {
        $query = $this->em->createQuery(
            ' SELECT COUNT(DISTINCT S.id) FROM StatEnseignantBundle:MdlAssignment A
                INNER JOIN StatEnseignantBundle:MdlAssignmentSubmissions S WITH A.id = S.assignment
                WHERE A.course = :course AND S.id IN (SELECT SS.id FROM StatEnseignantBundle:MdlAssignment AA
                INNER JOIN StatEnseignantBundle:MdlAssignmentSubmissions SS WITH AA.id = SS.assignment
                WHERE AA.course = :course AND SS.numfiles > 0)
            '
        )->setParameter('course', $idCours);
        $nbDevoirs = $query->getSingleResult();

        $query2 = $this->em->createQuery(
            ' SELECT COUNT(DISTINCT A.id) FROM StatEnseignantBundle:MdlAssignment A
                INNER JOIN StatEnseignantBundle:MdlAssignmentSubmissions S WITH A.id = S.assignment
                WHERE A.course = :course AND S.id IN (SELECT SS.id FROM StatEnseignantBundle:MdlAssignment AA
                INNER JOIN StatEnseignantBundle:MdlAssignmentSubmissions SS WITH AA.id = SS.assignment
                WHERE AA.course = :course AND SS.numfiles > 0)
            '
        )->setParameter('course', $idCours);
        $result = $query2->getSingleResult();
        $totalRendusPossibles = $result[1] * $this->getNbStudent($idCours);

        if($nbDevoirs == 0 || $totalRendusPossibles == 0)
            return 0;
        else
            return ($totalRendusPossibles/$nbDevoirs[1])*100;
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de sujets lancés dans un forum pour ce cours
     */
    protected function getNbSubjectForum($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(D.id) FROM StatEnseignantBundle:MdlForumDiscussions D WHERE D.course = :course'
        )->setParameter('course', $course);
        $nbForums = $query->getSingleResult();

        return $nbForums[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de tests dans le cours
     */
    protected function getNbLesson($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(L.id) FROM StatEnseignantBundle:MdlLesson L WHERE L.course = :course'
        )->setParameter('course', $course);
        $nbLesson = $query->getSingleResult();

        return $nbLesson[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre d'ateliers dans le cours
     */
    protected function getNbWorkshop($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(W.id) FROM StatEnseignantBundle:MdlWorkshop W WHERE W.course = :course'
        )->setParameter('course', $course);
        $nbWorkshop = $query->getSingleResult();

        return $nbWorkshop[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de base de données créées pour le cours
     */
    protected function getNbDatabase($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(D.id) FROM StatEnseignantBundle:MdlData D WHERE D.course = :course'
        )->setParameter('course', $course);
        $nbData = $query->getSingleResult();

        return $nbData[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de ressources cachées par rapport
     * au nombre de ressources dans le cours
     */
    protected function getPercentageHiddenResource($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(R.id) FROM StatEnseignantBundle:MdlResource R
            INNER JOIN StatEnseignantBundle:MdlUrl U WITH R.course = U.course
            WHERE R.course = :course'
        )->setParameter('course', $course);
        $nbRessources = $query->getSingleResult();

        $query = $this->em->createQuery(
            'SELECT count(R.id) FROM StatEnseignantBundle:MdlResource R
            INNER JOIN StatEnseignantBundle:MdlUrl U WITH R.course = U.course
            WHERE R.course = :course'
        )->setParameter('course', $course);
        $nbHiddenRessources = $query->getSingleResult();

        if($nbRessources[1] == 0)
            return 0;
        else
            return ($nbRessources[1]/$nbRessources[1])*100;
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre d'étudiants inscrits dans le cours
     */
    protected function getNbStudent($course)
    {
        //Nombre d'étudiants inscrits sur Moodle dans ce cours
        $query = $this->em->createQuery(
            'SELECT count(C.id) FROM StatEnseignantBundle:MdlCourse C
             INNER JOIN StatEnseignantBundle:MdlEnrol E WITH E.courseid = C.id
             INNER JOIN StatEnseignantBundle:MdlUserEnrolments UE WITH UE.enrolid = E.id
             INNER JOIN StatEnseignantBundle:MdlUser U WITH U.id = UE.userid
             WHERE C.id = :course AND E.roleid = 5'
        )->setParameter('course', $course);
        $nbEtudiant = $query->getSingleResult();

        return $nbEtudiant[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre d'enseignants dans le cours
     */
    protected function getNbTeacher($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(C.id) FROM StatEnseignantBundle:MdlCourse C
             INNER JOIN StatEnseignantBundle:MdlEnrol E WITH E.courseid = C.id
             WHERE C.id = :course AND E.roleid IN (3,4)'
        )->setParameter('course', $course);
        $nbEnseignant = $query->getSingleResult();

        return $nbEnseignant[1];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de sections dans le cours
     */
    protected function getNbSection($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(S.id) FROM StatEnseignantBundle:MdlCourseSections S
             WHERE S.course = :course AND S.visible = 0'
        )->setParameter('course', $course);
        $nbSection = $query->getSingleResult();

        return $nbSection[1];
    }

    /**
     * @param $idCours
     * @return mixed
     *
     * Retourne le nombre  moyen de post / nb étudiants inscrits
     */
    protected function getAvgPost($idCours)
    {
        $query = $this->em->createQuery(
            'SELECT count(FP.id) FROM StatEnseignantBundle:MdlForumPosts FP
             INNER JOIN StatEnseignantBundle:MdlForumDiscussions FD
             WHERE FD.course = :course'
        )->setParameter('course', $idCours);
        $nbPost = $query->getSingleResult();
        $nbStudent = $this->getNbStudent($idCours);

        if($nbStudent == 0)
            return 0;
        else
            return $nbPost[1]/$nbStudent;
    }

    /**
     * @param $course
     *
     * Retourne le nombre d'étudiants ayant posté au moins deux
     * messages dans les nbForums / nb étudiants inscrits
     */
    protected function getNbStudentForum($course)
    {
        $query = $this->em->createQuery(
            'SELECT count(FP.userid) FROM StatEnseignantBundle:MdlForumPosts FP
             INNER JOIN StatEnseignantBundle:MdlForumDiscussions FD
             WHERE FD.course = :course
             GROUP BY FP.userid
             HAVING COUNT(FP.id) > 1'
        )->setParameter('course', $course);

        $nb = $query->getResult();
        $nbStudent = $this->getNbStudent($course);

        if($nbStudent == 0)
            return 0;
        else
            return count($nb)/$nbStudent;
    }

    /**
     * @param $course
     * @return float|int
     * @throws
     *
     * Retourne le nombre d'étudiants inscrit dans le cours
     * par rapport au nombre d'étudiants inscrits pédagogiquement
     */
    protected function getPercentageStudent($course)
    {
        //Nombre d'étudiants inscrits sur Moodle dans ce cours
        $query = $this->em->createQuery(
            'SELECT count(C.id) FROM StatEnseignantBundle:MdlCourse C
             INNER JOIN StatEnseignantBundle:MdlEnrol E WITH E.courseid = C.id
             INNER JOIN StatEnseignantBundle:MdlUserEnrolments UE WITH UE.enrolid = E.id
             INNER JOIN StatEnseignantBundle:MdlUser U WITH U.id = UE.userid
             WHERE C.id = :course'
        )->setParameter('course', $course);
        $nbEtudiant = $query->getSingleResult();


        //Nombre d'étudiants inscrits pédagogiquement à ce cours dans le SI
        $cours = $this->em->getRepository('StatEnseignantBundle:MdlCourse')->find($course);

        if($cours === null)
            throw new NotFoundHttpException('Le cours [id='.$course.'] n\'existe pas.');


        //On retourne le pourcentage
        return ($nbEtudiant[1])*100;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne un graphe avec les ressources du cours
     * Possibilité de choisir le titre du graphe
     * et son type : 'bar' ou 'column'
     */
    protected function getGraphResources($idCours)
    {
        $titre = 'ressources';
        $type = 'column';
        $retour = array();
        $tmp = array();
        $tmp['pdf'] = $this->getNbResource($idCours);
        $tmp['liens_externes'] = $this->getNbUrlResource($idCours);

        $retour['titre'] = $titre;
        $retour['data'] = $tmp;
        $retour['type'] = $type;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne un graphe avec les ressources structurées du cours
     * Possibilité de choisir le titre du graphe
     * et son type : 'bar' ou 'column'
     */
    protected function getGraphResourcesStruct($idCours)
    {
        $titre = 'ressources struct';
        $type = 'column';
        $retour = array();
        $tmp = array();
        $tmp['bdd'] = $this->getNbDatabase($idCours);
        $tmp['glossaire'] = $this->getNbGlossary($idCours);
        $tmp['etiquette'] = $this->getNbLabel($idCours);

        $retour['titre'] = $titre;
        $retour['data'] = $tmp;
        $retour['type'] = $type;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne un graphe avec les rendus du cours
     * Possibilité de choisir le titre du graphe
     * et son type : 'bar' ou 'column'
     */
    protected function getGraphRendu($idCours)
    {
        $titre = 'rendus';
        $type = 'column';
        $retour = array();
        $tmp = array();
        $tmp['devoir'] = $this->getNbAssignment($idCours);
        $tmp['test'] = $this->getNbLesson($idCours);
        $tmp['atelier'] = $this->getNbWorkshop($idCours);

        $retour['titre'] = $titre;
        $retour['data'] = $tmp;
        $retour['type'] = $type;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe du pourcentage du nombre d'étudiants
     * inscrits sur Moodle par rapport à ceux inscrits pédagogiquement
     * et son type : 'bar' ou 'column'
     */
    protected function getGraphInscription($idCours)
    {
        $titre = 'inscription';
        $type = 'bar';
        $retour = array();
        $tmp = array();
        $tmp['inscription'] = $this->getPercentageStudent($idCours);

        $retour['titre'] = $titre;
        $retour['data'] = $tmp;
        $retour['type'] = $type;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe du pourcentage de ressources cachées par rapport
     * au nombre total de ressources
     * et son type : 'bar' ou 'column'
     */
    protected function getGraphHiddenResource($idCours)
    {
        $titre = 'ressources_cachées';
        $type = 'bar';
        $desc = '(Pourcentage) <br/>Nombre de ressources cachées dans le cours par rapport au nombre de ressources disponibles.';
        $retour = array();
        $tmp = array();
        $tmp['ressources_cachées'] = $this->getPercentageHiddenResource($idCours);

        $retour['titre'] = $titre;
        $retour['type'] = $type;
        $retour['data'] = $tmp;
        $retour['description'] = $desc;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe avec la moyenne des connexions étudiantes au cours par semaine
     */
    protected function getGraphConnexionStudent($idCours)
    {
        $titre = 'connexion_moyenne';
        $type = 'line';
        $desc = '(Moyenne) <br/>Moyenne des connexions des étudiants au cours, par semaine.';
        $retour = array();
        $tmp = array();

        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy,date FROM (
                          SELECT count(*) as c, WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
                          FROM mdl_log
                          WHERE course = ".$idCours."
                          group by date, userid)cnt
                          group by date");
        $statement->execute();
        $results = $statement->fetchAll();

        $tmp['connexion_moyenne'] = $results;

        $retour['titre'] = $titre;
        $retour['type'] = $type;
        $retour['data'] = $tmp;
        $retour['description'] = $desc;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe du nombre de connexion moyen par ressource
     */
    protected function getGraphConnexionResource($idCours)
    {
        $titre = 'connexion_moyenne_ressource';
        $type = 'column';
        $desc = '(Moyenne) <br/>Moyenne des connexions des étudiants à une ressource, par semaine.';
        $retour = array();
        $tmp = array();
        $donnees = array();

        $tmp['connexion_moyenne'] = $this->getActiveResourceByR($idCours);

        foreach($tmp['connexion_moyenne'] as $data)
            $donnees[$data['name']] = $data['moy'];

        $retour['titre'] = $titre;
        $retour['type'] = $type;
        $retour['data'] = $donnees;
        $retour['description'] = $desc;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le nombre de messages moyen posté par un étudiant.
     */
    protected function getGraphForum($idCours)
    {
        $titre = 'utilisation_forum';
        $type = 'column';
        $desc = '<br/>1- (Moyenne) Nombre de messages moyen posté par les étudiants.<br/>2- (Moyenne) Pourcentage d\'étudiants ayant posté au moins 2 messages.<br/>3- (Moyenne) Pourcentage du nombre de fils de discussion ayant plus de 2 réponses.';
        $retour = array();

        $tmp = array();
        $tmp['messages_moyen'] = $this->getAvgPost($idCours);
        $tmp['deux_messages'] = $this->getNbStudentForum($idCours);
        $tmp['fils_moyen'] = $this->getNbStudentForum($idCours);

        $retour['titre'] = $titre;
        $retour['type'] = $type;
        $retour['data'] = $tmp;
        $retour['description'] = $desc;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le nombre de devoirs rendus par semaine et par devoir.
     */
    protected function getGraphAssignmentPerWeek($idCours)
    {
        $titre = 'devoirs_moyenne';
        $type = 'line';
        $desc = '(Evolution) <br/>Nombre de devoirs rendus par semaine et par devoir.';
        $retour = array();
        $tmp = array();

        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT cnt.c as moy, id, date FROM (
                            SELECT COUNT( * ) AS c, mdl_assignment.id AS id, WEEKOFYEAR( FROM_UNIXTIME( mdl_assignment_submissions.timecreated ) ) AS DATE
                            FROM  mdl_assignment_submissions
                            INNER JOIN mdl_assignment ON mdl_assignment_submissions.assignment = mdl_assignment.id
                            WHERE course = ".$idCours."
                            GROUP BY mdl_assignment.id)cnt
                            GROUP BY DATE");
        $statement->execute();
        $results = $statement->fetchAll();

        $tmp['devoirs_moyenne'] = $results;

        $retour['titre'] = $titre;
        $retour['type'] = $type;
        $retour['data'] = $tmp;
        $retour['description'] = $desc;
        $retour['max'] = 20;

        return $retour;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe représentant le nombre de connexions par rapport a la moyenne
     * des autres étudiants depuis les logs Moodle
     */
    protected function getConnectionPerStudent($idCours)
    {
        $titre = 'connexion';
        $retour = array();

        $data = $this->getActiveResourcePerStudent($idCours);

        $retour['titre'] = $titre;
        $retour['data'] = $data;

        return $retour;
    }

    protected function getGrapheConnectionResourcePerStudent($idCours)
    {
        $titre = 'consultation_ressource';
        $retour = array();

        $data = $this->getConnectionResourcePerStudent($idCours);

        $retour['titre'] = $titre;
        $retour['data'] = $data;

        return $retour;
    }
}
