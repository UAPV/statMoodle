<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: fanny
=======
 * User: Fanny MARCEL
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
 * Date: 11/02/14
 * Time: 15:03
 */

namespace Stat\EnseignantBundle\Modules;

<<<<<<< HEAD
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
=======
require('Indicateurs/Indicateur.class.php');

/** On charge automatiquement les classes Indicateurs dans le dossier du même nom **/
$dirname = '../src/Stat/EnseignantBundle/Modules/Indicateurs/';
$dir = opendir($dirname);

if($dir !== false) {
    while(false!==($file = readdir($dir))) {
        if($file != '.' && $file != '..' && !is_dir($dirname.$file))
        {
            if($file != "Indicateur.class.php")
                require ("Indicateurs/$file");
        }
    }
    closedir($dir);
}

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

class Fonctions {

   protected $em;
   protected $container;

<<<<<<< HEAD
   public function __construct(Container $service_container)
=======
    /**
     * @param Container $service_container
     * Constructeur pour récupérer la classe Fonctions
     */
    public function __construct(Container $service_container)
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
   {
      $this->container = $service_container;
   }

<<<<<<< HEAD
   public function setEntityManager(ObjectManager $em)
=======
    /**
     * @param ObjectManager $em
     * Fonction permettant à Symfony de récupérer cette classe
     */
    public function setEntityManager(ObjectManager $em)
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
   {
       $this->em = $em;
   }

    /**
<<<<<<< HEAD
=======
     * @param $username
     * @return array|bool
     * Retourne vrai si la personne $username est responsable de formation (rôle Moodle)
     */
    public function isResponsible($username)
   {
       $query = $this->em->createQuery(
           'SELECT course_categ.name, course_categ.id
                FROM StatEnseignantBundle:MdlUser user, StatEnseignantBundle:MdlRoleAssignments rass, StatEnseignantBundle:MdlContext cont, StatEnseignantBundle:MdlCourseCategories course_categ, StatEnseignantBundle:MdlRole role
                WHERE user.id = rass.userid
                AND rass.contextid = cont.id
                AND cont.instanceid = course_categ.id
                AND rass.roleid = role.id
                AND role.shortname = :shortname
                AND user.username = :username'
       )->setParameters(array('shortname' => 'responsable_formation', 'username' => $username));

       $courses = $query->getResult();
       $data = array();
       foreach($courses as $cours)
          $data[$cours['id']] = $cours['name'];

       if(count($courses) > 0)
           return $data;
       else
           return false;
   }

    /**
     * @param $username
     * @return array|bool
     * Retourne vrai si la personne $username a un rôle "labélisation" (rôle Moodle)
     */
   public function isLabelisation($username)
   {
       $query = $this->em->createQuery(
            'SELECT role.id
                 FROM StatEnseignantBundle:MdlUser user, StatEnseignantBundle:MdlRoleAssignments rass, StatEnseignantBundle:MdlContext cont, StatEnseignantBundle:MdlRole role
                 WHERE user.id = rass.userid
                 AND rass.contextid = cont.id
                 AND rass.roleid = role.id
                 AND role.id = :role
                 AND user.username = :username'
       )->setParameters(array('role' => 11, 'username' => $username));

       $ids = $query->getResult();
       if(count($ids) > 0)
           return true;
       else
           return false;
   }

    /**
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
     foreach($courses as $course)
     {
       $retour = $this->getDataCoursTice($course['id']);
       $actif = $this->getDataCoursActif($course['id']);
       $tmp[key($retour)] = $retour[key($retour)];
       $tmp[key($actif)] = $actif[key($actif)];
       $description = $this->getNbStudent($course['id']).' étudiants inscrits<br/> '.$this->getNbTeacher($course['id']).' enseignants inscrits<br/>'.$this->getNbSection($course['id']).' sections ouvertes';
       $data[$course['id']] = array('fullname' => $course['fullname'], 'donnees' => $tmp, 'desc' => $description);
     }
=======
     $alertes = array();

     if(count($courses) > 0)
     {
         foreach($courses as $course)
         {
           $retour = $this->getDataCoursGlobal($course['id']);

           foreach($retour as $cle => $d)
           {
               if("alerte" == strval($cle))
               {
                   if(isset($d[$course['id']]))
                      $alertes = $d;
               }
               else
               {
                   if(isset($d[key($d)]['nb']))
                   {
                     $tmp[key($d)]['data'] = $d[key($d)]['nb'];
                     $tmp[key($d)]['type'] = $d[key($d)]['type'];
                   }
                   else
                   {
                     $tmp[key($d)]['data'] = $d['nb'];
                     $tmp[key($d)]['type'] = $d['type'];
                   }
               }
           }

           $description = $this->getNbStudent($course['id']).' étudiants inscrits<br/> '.$this->getNbTeacher($course['id']).' enseignants inscrits<br/>'.$this->getNbSection($course['id']).' sections ouvertes';
           $data[$course['id']] = array('fullname' => $course['fullname'], 'donnees' => $tmp, 'desc' => $description, 'alertes' => $alertes);
         }
     }
     else
       return false;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

     return $data;
   }

    /**
<<<<<<< HEAD
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
=======
     * @param $idFormation
     *
     * Retourne le nom de la catégorie passée en paramètre
     */
    public function getCategoryName($idFormation)
    {
        $query = $this->em->createQuery(
            'SELECT categ.name
                 FROM StatEnseignantBundle:MdlCourseCategories categ
                 WHERE categ.id = :formation'
        )->setParameters(array('formation' => $idFormation));

        $name = $query->getResult();

        return $name[0]['name'];
    }

    /**
     * @param $idFormation
     *
     * Retourne tous les cours d'une formation
     * Avec un tableau pour chaque indicateur
     */
    public function getDataCoursResponsable($idFormation)
    {
        $query = $this->em->createQuery(
            'SELECT DISTINCT course.id, course.fullname, course.idnumber
                 FROM StatEnseignantBundle:MdlCourseCategories course_categ, StatEnseignantBundle:MdlCourse course
                 WHERE course_categ.id = :formation
                 AND course_categ.id = course.category'
        )->setParameters(array('formation' => $idFormation));

        $courses = $query->getResult();

        $data = array();
        $tmp = array();
        $alertes = array();

        if(count($courses) > 0)
        {
            foreach($courses as $course)
            {
                $retour = $this->getDataCoursGlobal($course['id']);

                foreach($retour as $cle => $d)
                {
                    if("alerte" == strval($cle))
                    {
                        if(isset($d[$course['id']]))
                            $alertes = $d;
                    }
                    else
                    {
                        if(isset($d[key($d)]['nb']))
                        {
                            $tmp[key($d)]['data'] = $d[key($d)]['nb'];
                            $tmp[key($d)]['type'] = $d[key($d)]['type'];
                        }
                        else
                        {
                            $tmp[key($d)]['data'] = $d['nb'];
                            $tmp[key($d)]['type'] = $d['type'];
                        }
                    }
                }

                $description = $this->getNbStudent($course['id']).' étudiants inscrits<br/> '.$this->getNbTeacher($course['id']).' enseignants inscrits<br/>'.$this->getNbSection($course['id']).' sections ouvertes';
                $data[$course['id']] = array('fullname' => $course['fullname'], 'donnees' => $tmp, 'desc' => $description, 'alertes' => $alertes);
            }
        }
        else
            return false;

        return $data;
    }

    /**
     * @param $username
     *
     * Retourne les cours d'un étudiant $username
     */
    public function getCourseStudentByUser($username)
    {
        $query = $this->em->createQuery(
            'SELECT DISTINCT course.id, course.fullname, course.idnumber
                 FROM StatEnseignantBundle:MdlUser user, StatEnseignantBundle:MdlRoleAssignments rass, StatEnseignantBundle:MdlContext cont, StatEnseignantBundle:MdlCourse course, StatEnseignantBundle:MdlRole role
                 WHERE user.id = rass.userid
                 AND rass.contextid = cont.id
                 AND rass.roleid = role.id
                 AND cont.instanceid = course.id
                 AND role.id = 5
                 AND user.username = :username
                 AND course.visible = 1'
        )->setParameters(array('username' => $username));

        $courses = $query->getResult();
        $data = array();

        if(count($courses) > 0)
        {
            foreach($courses as $course)
            {
                $retour = $this->getDataDetailsStudent($course['id'],$username);

                $description = $this->getNbStudent($course['id']).' étudiants inscrits<br/> '.$this->getNbTeacher($course['id']).' enseignants inscrits<br/>'.$this->getNbSection($course['id']).' sections ouvertes';
                $data[$course['id']] = array('fullname' => $course['fullname'], 'donnees' => $retour, 'desc' => $description);
            }
        }
        else
          return false;

        return $data;
    }


    /**
     * @param $idCours
     * @return array
     * Retourne les indicateurs sur la page d'accueil
     */
    public function getDataCoursGlobal($idCours)
    {
       \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));
       $indic1 = new \Indicateur1 ();

       try {
        $data = $indic1->mesIndicateurs($idCours);

          $retour = array();
          $alertes = array();
          $cpt = 0;
          foreach($data as $cle => $indicateur)
          {
            if($cle == 'alerte')
            {
                foreach($indicateur as $alerte)
                {
                    //On récupère les alertes
                    $couleur = $alerte['couleur'];
                    $keys = array_keys($couleur);

                    if(isset($alerte['fonction']))
                    {
                       $result = $indic1->$alerte['fonction']();
                       foreach($result as $cleCours => $cours)
                       {
                           switch ($cours) {
                              case 0:
                                if($couleur[$keys[0]])
                                {
                                  $alertes[$cleCours][$cpt] = array('message' => strval($alerte['message']), 'couleur' => $keys[0]);
                                  $cpt += 1;
                                }
                                break;
                              case 1:
                                if($couleur[$keys[1]])
                                {
                                  $alertes[$cleCours][$cpt] = array('message' => strval($alerte['message']), 'couleur' => $keys[1]);
                                  $cpt += 1;
                                }
                                break;
                              case 2:
                                if($couleur[$keys[2]])
                                {

                                  $alertes[$cleCours][$cpt] = array('message' => strval($alerte['message']), 'couleur' => $keys[2]);
                                  $cpt += 1;
                                }
                                break;
                           }
                       }
                    }
                }
                $retour['alerte'] = $alertes;
            }
            else
            {
                //On récupère la configuration du fichier
                $titre = $indicateur['titre'];
                $type = $indicateur['type'];
                $nb = array();

                foreach($indicateur as $cle => $indic)
                {
                    if (preg_match("/^indicateur\d/", $cle))
                    {
                        if(isset($indic['requete']))
                            $nb[$indic['titre']] = $this->executeRequeteAccueil($indic['requete']);
                        else if(isset($indic['fonction']))
                            $nb[$indic['titre']] = $indic1->$indic['fonction']($idCours);
                    }
                }
            }
            $retour[] = array($titre => array('type' => $type, 'nb' => $nb));
           }
       }
       catch (Exception $e){
           echo 'Erreur : ',  $e->getMessage(), "\n";
       }

       return $retour;
    }

    /**
     * @param $idCours
     * @param $type
     * @return array
     * Retourne les données d'un cours : un cours TICE et un cours actif
     */
    public function getDataCoursDetails($idCours, $type)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        if($type == "getDataCoursTice")
          $indicObject = new \Indicateur2 ();
        elseif($type == "getDataCoursActif")
          $indicObject = new \Indicateur3 ();

        try {
            $data = $indicObject->mesIndicateurs($idCours);

            $retour = array();
            $alertes = array();
            $cpt = 0;
            foreach($data as $cle => $indicateur)
            {
               if($cle == 'alerte')
               {
                  foreach($indicateur as $alerte)
                  {
                     //On récupère les alertes
                     $couleur = $alerte['couleur'];
                     $keys = array_keys($couleur);

                     if(isset($alerte['fonction']))
                     {
                       $result = $indicObject->$alerte['fonction']();
                       switch ($result) {
                         case 0:
                           if($couleur[$keys[0]])
                           {
                             $alertes[$cpt] = array('message' => strval($alerte['message']), 'couleur' => $keys[0]);
                             $cpt += 1;
                           }
                           break;
                         case 1:
                           if($couleur[$keys[1]])
                           {
                             $alertes[$cpt] = array('message' => strval($alerte['message']), 'couleur' => $keys[1]);
                             $cpt += 1;
                           }
                           break;
                         case 2:
                           if($couleur[$keys[2]])
                           {
                             $alertes[$cpt] = array('message' => strval($alerte['message']), 'couleur' => $keys[2]);
                             $cpt += 1;
                           }
                           break;
                         }
                       }
                     }

                  $retour['alerte'] = $alertes;
               }
               else
               {
                        //On récupère la configuration du fichier
                        $titre = $indicateur['titre'];
                        $type = $indicateur['type'];
                        $max = $indicateur['max'];

                        //var_dump($indicateur);die;
                        foreach($indicateur as $cle => $indic)
                        {
                          $nb = array();
                          if (preg_match("/^indicateur\d/", $cle))
                          {
                            if($type == "spider" || $type == "line")
                            {
                              if(isset($indic['requete']))
                              {
                                if($type == "spider")
                                  $nb[$indic['titre']] = $this->executeRequeteAccueil($indic['requete']);
                                elseif($type == "line")
                                  $nb[$indic['titre']] = $this->executeRequeteMultipleAccueil($indic['requete']);
                              }
                              else if(isset($indic['fonction']))
                                $nb[$indic['titre']] = $indicObject->$indic['fonction']($idCours);

                              $values[] = array('titre' => $indic['titre'],'description' => $indic['desc'],'type' => $type, 'data' => $nb, 'max' => $max);
                            }
                            else if($type == "column" || $type == "bar")
                            {
                                $tmp = array();
                                foreach($indic as $key => $i)
                                {
                                  if($key == "requete")
                                  {
                                    if(is_array($i))
                                    {
                                      if($type == "line")
                                      {
                                        foreach($i as $cle => $req)
                                          $tmp[$cle] = $this->executeRequeteMultipleAccueil($req);
                                      }
                                      else
                                      {
                                        foreach($i as $cle => $req)
                                          $tmp[$cle] = $this->executeRequeteAccueil($req);
                                      }
                                    }
                                    else
                                    {
                                      if($type == "line")
                                        $tmp[$indic['titre']] = $this->executeRequeteMultipleAccueil($i);
                                      else
                                        $tmp[$indic['titre']] = $this->executeRequeteAccueil($i);
                                    }
                                    $nb[] = $tmp;
                                  }
                                  if ($key == "fonction")
                                  {
                                    if(is_array($i))
                                    {
                                      if(isset($i['fonction'])) {
                                          foreach($i['fonction'] as $cle => $fonction)
                                            $tmp[$cle] = $indicObject->$fonction($idCours);
                                      }
                                      else
                                      {
                                          foreach($i as $cle => $fonction)
                                            $tmp[$cle] = $indicObject->$fonction($idCours);
                                      }
                                    }
                                    else
                                    {
                                      $d = $indicObject->$i($idCours);
                                      $tmp = array();

                                      if(isset($d["titre_inclus"]))
                                      {
                                         foreach($d as $categ)
                                         {
                                           if(isset($categ['nom']) && $categ['nom'] != '')
                                             $tmp[$categ['nom']] = $categ['moy'];
                                         }
                                      }
                                      else
                                        $tmp[$indic['titre']] = $indicObject->$i($idCours);
                                    }
                                    $nb[] = $tmp;
                                  }
                                }
                            $values[] = array('titre' => $indic['titre'],'description' => $indic['desc'],'type' => $type, 'data' => $nb[0], 'max' => $max);
                          }
                        }
                        }
               }
            }

            $retour = array($titre => $values, 'alertes' => $alertes);
        }
        catch (Exception $e){
            echo 'Erreur : ',  $e->getMessage(), "\n";
        }

        return $retour;
    }

    /**
     * @param $req
     * @return mixed
     * Exécute les requêtes retournées par le fichier de configuration
     * des indicateurs; une seule valeur
     */
    public function executeRequeteAccueil($req)
    {
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare($req);
        $statement->execute();
        $results = $statement->fetchAll();

        return $results[0]['moy'];
    }

    /**
     * @param $req
     * @return mixed
     * Exécute les requêtes retournées par le fichier de configuration
     * des indicateurs; valeurs multiples
     */
    public function executeRequeteMultipleAccueil($req)
    {
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare($req);
        $statement->execute();
        $results = $statement->fetchAll();

        return $results;
    }

    /**
     * @param $idCours
     * @return array
     * Retourne les données d'un cours pour la vue cohorte
     */
    public function getDataGlobalStudent($idCours)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));
        $indic = new \Indicateur4 ();
        $data = $indic->mesIndicateurs($idCours);

        try {
            //On récupère la configuration du fichier
            $nb = array();

            if(isset($data[1]))
            {
                foreach($data[1] as $cle => $ind)
                {
                    $tmp = array();
                    if (preg_match("/^indicateur\d/", $cle))
                    {
                        if(isset($ind['requete']))
                        {
                          foreach($ind['requete'] as $cle => $req)
                          {
                            $donnees = array();
                            $donnees[] = $this->executeRequeteAccueil($req);
                          }
                          $nb[] = $tmp;
                        }
                        else if(isset($ind['fonction']))
                        {
                          foreach($ind['fonction'] as $cle => $fonction)
                          {
                            $titreFonction = $cle;
                            $dataFonction = $indic->$fonction($idCours);
                            $tmp[$titreFonction] = array('titre' => $titreFonction, "data" => $dataFonction);
                          }
                        }
                    }
                }
            }

            if(isset($data["alerte"]))
            {
                foreach($data['alerte'] as $alerte)
                {
                    $fonction = $alerte['fonction'];
                    $tmp['alerte'][] = array('message' => $alerte['message'], 'couleur' => $alerte['couleur'], 'data' => $indic->$fonction());
                }
            }
        }
        catch (Exception $e){
          echo 'Erreur : ',  $e->getMessage(), "\n";
        }

        return array($tmp);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    /**
     * @param $nameStudent
     * @param $idCours
     *
     * Requetes dans Moodle pour récupérer les valeurs concernant un seul étudiant
     * Retourne un tableau de valeurs avec les fonctions données dans $nb
     */
<<<<<<< HEAD
    public function getDataDetailsStudent($nameStudent, $idCours)
    {
        $titre = 'Détail de l\'étudiant '.$nameStudent;
        $nb = array();

        $nb['connexion'] = $this->getPercentageConnection($idCours);

        return array($titre => $nb);
=======
    public function getDataDetailsStudent($idCours,$nameStudent)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        $indicObject = new \Indicateur5 ();

        try {
            $data = $indicObject->mesIndicateurs($idCours);
            $indicObject->setStudent($nameStudent);
            $values = array();

            $retour = array();
            foreach($data as $indicateur)
            {
                //On récupère la configuration du fichier
                $titre = $indicateur['titre'];
                $type = $indicateur['type'];
                $max = $indicateur['max'];

                foreach($indicateur as $cle => $indic)
                {
                    $nb = array();
                    if (preg_match("/^indicateur\d/", $cle))
                    {
                        if($type == "spider" || $type == "line")
                        {
                            if(isset($indic['requete']))
                            {
                                if($type == "spider")
                                    $nb[$indic['titre']] = $this->executeRequeteAccueil($indic['requete']);
                                elseif($type == "line")
                                    $nb[$indic['titre']] = $this->executeRequeteMultipleAccueil($indic['requete']);
                            }
                            else if(isset($indic['fonction']))
                                $nb[$indic['titre']] = $indicObject->$indic['fonction']($idCours);

                            $values[] = array('titre' => $indic['titre'],'description' => $indic['desc'],'type' => $type, 'data' => $nb, 'max' => $max);
                        }
                        else if($type == "column" || $type == "bar" || $type == "multipleLine")
                        {
                            $tmp = array();
                            foreach($indic as $key => $i)
                            {
                                if($key == "requete")
                                {
                                    if(is_array($i))
                                    {
                                        if($type == "line")
                                        {
                                            foreach($i as $cle => $req)
                                                $tmp[$cle] = $this->executeRequeteMultipleAccueil($req);
                                        }
                                        else
                                        {
                                            foreach($i as $cle => $req)
                                                $tmp[$cle] = $this->executeRequeteAccueil($req);
                                        }
                                    }
                                    else
                                    {
                                        if($type == "line")
                                            $tmp[$indic['titre']] = $this->executeRequeteMultipleAccueil($i);
                                        else
                                            $tmp[$indic['titre']] = $this->executeRequeteAccueil($i);
                                    }
                                    $nb[] = $tmp;
                                }
                                if ($key == "fonction")
                                {
                                    if(is_array($i))
                                    {
                                        if(isset($i['fonction'])) {
                                            foreach($i['fonction'] as $cle => $fonction)
                                                $tmp[$cle] = $indicObject->$fonction($idCours);
                                        }
                                        else
                                        {
                                            foreach($i as $cle => $fonction)
                                              $tmp[$cle] = $indicObject->$fonction($idCours);
                                        }
                                    }
                                    else
                                    {
                                        $d = $indicObject->$i($idCours);
                                        $tmp = array();

                                        if(isset($d["titre_inclus"]))
                                        {
                                            foreach($d as $categ)
                                            {
                                                if(isset($categ['nom']) && $categ['nom'] != '')
                                                    $tmp[$categ['nom']] = $categ['moy'];
                                            }
                                        }
                                        else
                                            $tmp[$indic['titre']] = $indicObject->$i($idCours);
                                    }
                                    $nb[] = $tmp;
                                }
                            }
                            if($type == 'multipleLine')
                            {
                                $connection = $this->em->getConnection('moodle');
                                $statement = $connection->prepare("select (WEEK(CAST(FROM_UNIXTIME(startdate) as date))) as date from mdl_course WHERE id=".$idCours);
                                $statement->execute();
                                $results = $statement->fetchAll();
                                $debut = $results[0]['date'];
                                $fin = strftime("%U");

                                $values[] = array('titre' => $indic['titre'],'description' => $indic['desc'],'type' => $type, 'data' => $nb[0], 'max' => $max, 'debut' => $debut, 'fin' => $fin);
                            }
                            else
                                $values[] = array('titre' => $indic['titre'],'description' => $indic['desc'],'type' => $type, 'data' => $nb[0], 'max' => $max);
                        }
                    }
                }
            }

            $retour = array($titre => $values);
        }
        catch (Exception $e){
            echo 'Erreur : ',  $e->getMessage(), "\n";
        }

        return $retour;
    }

    /**
     * Retourne tous les enseignants inscrits comme tels dans Moodle
     */
    public function getEnseignantMoodle()
    {
        $query = $this->em->createQuery(
            'SELECT user.firstname,user.lastname, user.id
                 FROM StatEnseignantBundle:MdlUser user, StatEnseignantBundle:MdlRoleAssignments rass, StatEnseignantBundle:MdlContext cont, StatEnseignantBundle:MdlCourseCategories course_categ, StatEnseignantBundle:MdlRole role
                 WHERE user.id = rass.userid
                 AND rass.contextid = cont.id
                 AND cont.instanceid = course_categ.id
                 AND rass.roleid = role.id
                 AND role.shortname IN (:shortname)
                 ORDER BY user.lastname ASC'
        )->setParameters(array('shortname' => array('editingteachercopy','teacher')));

        $ens = $query->getResult();
        $data = array();
        foreach($ens as $e)
            $data[$e['id']] = $e['lastname'].' '.$e['firstname'];

        if(count($ens) > 0)
            return $data;
        else
            return false;
    }

    /**
     * @return mixed
     * Retourne les composantes du SI
     */
    public function getComposantes()
    {
      \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

      return \Indicateur::getComposantes();
    }

    /**
     * @return mixed
     * Retourne les filieres du SI
     */
    public function getFilieres($composante)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        return \Indicateur::getFilieres($composante);
    }

    /**
     * @return mixed
     * Retourne les diplomes du SI
     */
    public function getDiplomes($filiere)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        return \Indicateur::getDiplomes($filiere);
    }

    /**
     * @return mixed
     * Retourne les matieres du SI
     */
    public function getMatieres($diplome)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        return \Indicateur::getMatieres($diplome);
    }

    /**
     * @return mixed
     * Retourne les infos d'une UE depuis le SI
     */
    public function getInfosUE($code)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        return \Indicateur::getInfosUE($code);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
     *
     * Retourne la moyenne du pourcentage d'utilisateurs
     * se connectant chaque semaine au cours
     */
    protected function getActiveResourcePerStudent($idCours)
    {
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy, userid, prenom FROM (
                            SELECT count(mdl_log.id) AS c, mdl_user.id as userid, CONCAT(lastname,' ',firstname) as prenom
=======
     * @param $nameStudent
     *
     * Retourne le nombre moyen de connexion pour l'étudiant $nameStudent et le cours $idCours
     * ainsi que la moyenne des connexions par semaine des autres étudiants
     */
    protected function getConnectionPerStudentAndCourse($nameStudent,$idCours)
    {
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy, userid, prenom, date FROM (
                            SELECT count(mdl_log.id) AS c, mdl_user.id as userid, CONCAT(lastname,' ',firstname) as prenom,WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_log ON mdl_log.userid = mdl_user.id
                            AND mdl_log.course = mdl_course.id
<<<<<<< HEAD
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
=======
                            WHERE course = ".$idCours."
                            AND CONCAT(lastname,'_',firstname) = '".$nameStudent."'
                            group by date, userid)cnt
                            group by date, userid ORDER BY prenom ASC
                      ");
        $statement->execute();
        $results = $statement->fetchAll();

        //On récupère une deuxième courbe qui est la moyenne des étudiants du cours
        $autres = $this->getGraphConnexionStudent($idCours);

        $data = array();
        $data['connexion_etudiant'] = $results;
        $data['autres'] = $autres;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

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

<<<<<<< HEAD
=======
    /**
     * @param $idCours
     * @return array
     *
     * Retourne le nombre moyen de ressources consultées par étudiant
     */
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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

<<<<<<< HEAD
        $autres = $this->getActiveResource($idCours);

        $data = array();
        foreach($results as $r)
            $data[$r['prenom']] = round($autres*$r['moy']/100,1);
=======
        $data = array();
        $data['ressources_etudiant'] = $results;

        $data = array();
        foreach($results as $etudiant)
          $data[$etudiant['prenom']] = intval($etudiant['moy']);
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7

        return $data;
    }

    /**
     * @param $idCours
<<<<<<< HEAD
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
=======
     * @return mixed
     *
     * Requête ramenant la moyenne de connexions aux ressources par semaine
     */
    protected function getConnectionResourceMoyenneCourse($idCours)
    {
        $action = 'view';
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("
        SELECT ROUND(AVG(cnt.c),0) as moy,date FROM (
                          SELECT count(*) as c, WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
                          FROM mdl_log
                          LEFT JOIN mdl_course_modules ON mdl_course_modules.id = mdl_log.cmid
                          LEFT JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                          LEFT JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                          WHERE mdl_log.course = ".$idCours."
                          AND mdl_modules.id
                          IN ( 15, 18 )
                          AND mdl_resource.display != 6
                          AND ACTION = '".$action."'
                          AND mdl_log.module = 'resource'
                          group by date)cnt
                          group by date");

        $statement->execute();
        $results = $statement->fetchAll();

        return $results;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }

    /**
     * @param $idCours
<<<<<<< HEAD
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
=======
     * @param $nameStudent
     * @return array
     *
     * Requête ramenant la moyenne de connexions aux ressources par semaine et par étudiant
     */
    protected function getConnectionResourcePerStudentAndCourse($idCours,$nameStudent)
    {
        $action = 'view';
        $connection = $this->em->getConnection('moodle');
        $statement = $connection->prepare("SELECT ROUND(AVG(cnt.c),0) as moy,userid, prenom,date
                            FROM (
                            SELECT count(mdl_log.id) AS c, mdl_log.userid as userid, CONCAT(lastname,' ',firstname) as prenom,WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_course_modules ON mdl_course_modules.course = mdl_course.id
                            LEFT JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                            LEFT JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                            LEFT JOIN mdl_log ON mdl_log.course=mdl_course.id
                            AND mdl_log.userid=mdl_user.id
                            WHERE mdl_course.id = ".$idCours."
                            AND CONCAT(lastname,'_',firstname) = '".$nameStudent."'
                            AND mdl_modules.id IN (15,18)
                            AND mdl_resource.display != 6
                            AND action = '".$action."'
                            GROUP BY userid,date )cnt
                            GROUP BY date ORDER BY prenom ASC");
        $statement->execute();
        $results = $statement->fetchAll();

        $autres = $this->getActiveResource($idCours);

        $data = array();
        $data["consultation_ressources_etudiant"] = $results;
        $data["autres"] = $autres;

        return $data;
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
     * Retourne le nombre de liens que contient le cours
=======
     * Retourne le nombre de liens externes
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
     * Retourne le nombre de devoirs (depot ayant au moins un rendu)
=======
     * Retourne le nombre de devoirs (ayant au moins un rendu)
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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

<<<<<<< HEAD
=======
    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de pages du cours (avec un display égal à 6)
     */
    protected function getNbPage($course)
    {
        $query = $this->em->createQuery(
            'SELECT COUNT(DISTINCT P.id) FROM StatEnseignantBundle:MdlPage P
                WHERE P.course = :course AND P.display = 6'
        )->setParameter('course', $course);
        $nbPages = $query->getSingleResult();

        return $nbPages[1];
    }

    /**
     * @param $idCours
     * @return float|int
     *
     * Retourne le pourcentage de devoirs non cachés par rapport au nombre total
     * de devoirs
     */
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
    protected function getNbStudent($course)
=======
    public function getNbStudent($course)
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
            'SELECT count(C.id) FROM StatEnseignantBundle:MdlCourse C
             INNER JOIN StatEnseignantBundle:MdlEnrol E WITH E.courseid = C.id
             WHERE C.id = :course AND E.roleid IN (3,4)'
=======
            'SELECT COUNT (course.id)
                FROM StatEnseignantBundle:MdlUser user, StatEnseignantBundle:MdlRoleAssignments rass, StatEnseignantBundle:MdlContext cont, StatEnseignantBundle:MdlCourse course, StatEnseignantBundle:MdlRole role
                WHERE user.id = rass.userid
                AND rass.contextid = cont.id
                AND rass.roleid = role.id
                AND cont.instanceid = course.id
                AND role.id IN (3,4)
                AND course.id = :course
                AND course.visible = 1'
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
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
=======
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
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
<<<<<<< HEAD
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
=======
     * @param $idCours
     * @return array
     *
     * Retourne les données pour les cours sur la page de labelisation
     */
    public function getDataCoursLabelisation($idCours)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));
        $indic1 = new \Indicateur6 ();

        try {
            $data = $indic1->mesIndicateurs($idCours);

            $retour = array();
            foreach($data as $indicateur)
            {
                    //On récupère la configuration du fichier
                    $titre = $indicateur['titre'];
                    $type = $indicateur['type'];
                    $nb = array();

                    foreach($indicateur as $cle => $indic)
                    {
                        if (preg_match("/^indicateur\d/", $cle))
                        {
                            if(isset($indic['requete']))
                                $nb[$indic['titre']] = $this->executeRequeteAccueil($indic['requete']);
                            else if(isset($indic['fonction']))
                                $nb[$indic['titre']] = $indic1->$indic['fonction']($idCours);
                        }
                    }
                $retour[] = array($titre => array('type' => $type, 'nb' => $nb));
            }
        }
        catch (Exception $e){
            echo 'Erreur : ',  $e->getMessage(), "\n";
        }

        return $retour;
    }

    /**
     * @param $porteur
     * @return string
     *
     * Retourne le nom du user à partir de son id
     */
    public function getNomPorteur($porteur)
    {
        $query = $this->em->createQuery('SELECT u.firstname, u.lastname FROM StatEnseignantBundle:MdlUser u WHERE u.id = '.$porteur);
        $noms = $query->getResult();

        return $noms[0]['firstname'].' '.$noms[0]['lastname'];
    }

    /**
     * @param $cours
     * @return bool
     *
     * Retourne vrai si le cours a une activité feedback, false sinon
     */
    public function hasFeedback($cours)
    {
        $query = $this->em->createQuery("SELECT f.id FROM StatEnseignantBundle:MdlFeedback f
                                         INNER JOIN StatEnseignantBundle:MdlCourse c WITH f.course = c.id
                                         WHERE c.idnumber LIKE '%".$cours."'");
        $results = $query->getResult();

        if(count($results) > 0)
          return true;
        else
          return false;
    }

    /**
     * @param $cours
     * Calcule du score TICE pour le cours $cours
     * On prend la formule suivante :
     * (10 x) nb fichiers + nb pages +
     * (3 x)  nb liens externes +
     * (20 x) nb ressources structurées (bdd, glossaire) +
     * nb tests +
     * nb devoirs +
     * nb étiquettes
     */
    public function scoreTice($cours)
    {
        return  (10 * ($this->getNbResource($cours) + $this->getNbPage($cours))) +
                (3 * $this->getNbUrlResource($cours) ) +
                (20 * ($this->getNbGlossary($cours) + $this->getNbDatabase($cours)) +
                $this->getNbLesson($cours) + $this->getNbAssignment($cours) + $this->getNbLesson($cours));

    }

    /**
     * @param $cours
     * @return mixed
     * Retourne le nombre d'étudiants du SI
     */
    public function getNbStudentInscritSI($cours)
    {
        \Indicateur::setEntityManager($this->em);//,$this->container->get('dosi_appig.modules'));

        return \Indicateur::getNbEtudiantsSI($cours);
    }

    /**
     * @param $cours
     * @return null
     * Retourne l'id d'un cours à partir de son code
     */
    public function getIdByCode($cours)
    {
        $query = $this->em->createQuery("SELECT C.id FROM StatEnseignantBundle:MdlCourse C WHERE C.idnumber LIKE '%".$cours."'");
        $codes = $query->getResult();

        if(count($codes) > 0)
            return $codes[0]['id'];
        else
            return null;
    }

    /**
     * @param $cours
     * @return null
     * Retourne l'idnumber d'un cours à partir de son id
     */
    public function getIdNumberById($cours)
    {
        $query = $this->em->createQuery("SELECT C.idnumber FROM StatEnseignantBundle:MdlCourse C WHERE C.id =".$cours."");
        $codes = $query->getResult();

        if(count($codes) > 0)
            return $codes[0]['idnumber'];
        else
            return null;
    }

    /**
     * @param $categ
     * @param $vide à mettre a "true" si
     * Retourne le nombre de cours dans le tableau passé en paramètre
     */
    public function getNbCourses($categ = null, $vide = false)
    {
        if($categ != null)
            $query = $this->em->createQuery("SELECT COUNT(C.id) as nb FROM StatEnseignantBundle:MdlCourse C WHERE C.category = ".$categ."");
        else
            $query = $this->em->createQuery("SELECT COUNT(C.id) as nb FROM StatEnseignantBundle:MdlCourse C");

        $results = $query->getResult();

        return $results[0]['nb'];
    }

    /**
     * @param $categ
     * Retourne le nombre de cours dans $categ avec un score TICE < 30
     */
    public function getNbCoursesPoorTice($categ = null)
    {
        if($categ != null)
            $query = $this->em->createQuery("SELECT C.id FROM StatEnseignantBundle:MdlCourse C WHERE C.category = ".$categ."");
        else
            $query = $this->em->createQuery("SELECT C.id FROM StatEnseignantBundle:MdlCourse C");

        $cours = $query->getResult();

        $poor = 0;
        foreach($cours as $c)
        {
            if($this->scoreTice($c['id']) < 30)
               $poor += 1;
        }

        return $poor;
    }

    /**
     * @param $categ
     * Retourne le nombre de cours dans $categ avec un score TICE > 100
     */
    public function getNbCoursesLabelisableTice($categ = null)
    {
        if($categ != null)
            $query = $this->em->createQuery("SELECT C.id FROM StatEnseignantBundle:MdlCourse C WHERE C.category = ".$categ."");
        else
            $query = $this->em->createQuery("SELECT C.id FROM StatEnseignantBundle:MdlCourse C");

        $cours = $query->getResult();

        $label = 0;
        foreach($cours as $c)
        {
            if($this->scoreTice($c['id']) > 100)
                $label += 1;
        }

        return $label;
    }

    /**
     * @param null $categ
     * @return mixed
     * Retourne le nombre de cours sans étudiants
     */
    public function getNbCoursesWithoutStudent($categ = null)
    {
        $q = "SELECT count(c.idnumber) as nb
                FROM StatEnseignantBundle:MdlCourse AS c
                WHERE (
                    SELECT COUNT( ra.userid ) AS Users
                    FROM StatEnseignantBundle:MdlRoleAssignments AS ra, StatEnseignantBundle:MdlContext AS ctx
                    WHERE ra.contextid = ctx.id
                    AND ra.roleid = 5
                    AND ctx.instanceid = c.id
                ) =0";

        if($categ != null)
           $q += "AND c.category = ".$categ;

        $query = $this->em->createQuery($q);
        $c = $query->getResult();

        return $c[0]['nb'];
    }

    /**
     * @param null $categ
     * @return mixed
     * Retourne le nombre de cours sans enseignants
     */
    public function getNbCoursesWithoutTeacher($categ = null)
    {
        $q = "SELECT count(c.idnumber) as nb
                FROM StatEnseignantBundle:MdlCourse AS c
                WHERE (
                    SELECT COUNT( ra.userid ) AS Users
                    FROM StatEnseignantBundle:MdlRoleAssignments AS ra, StatEnseignantBundle:MdlContext AS ctx
                    WHERE ra.contextid = ctx.id
                    AND ra.roleid in (3,4)
                    AND ctx.instanceid = c.id
                ) = 0";

        if($categ != null)
            $q += "AND c.category = ".$categ;

        $query = $this->em->createQuery($q);
        $c = $query->getResult();

        return $c[0]['nb'];
    }

    /**
     * @param null $categ
     * Retourne le nombre de cours vides
     */
    public function getNbEmptyCourses($categ = null)
    {
       /* $q = "SELECT count(C.id) as nbPost FROM StatEnseignantBundle:MdlForum F, StatEnseignantBundle:MdlCourse C, StatEnseignantBundle:MdlForumDiscussions FD, StatEnseignantBundle:MdlForumPosts FP
                WHERE C.id = F.course
                AND FP.discussion = FD.id
                AND FD.forum = F.id
                AND F.name != 'Forum des nouvelles'
                HAVING count(FP.id) = 0";

        if($categ != null)
            $q += "WHERE C.category IN (".$categ.")";

        $query = $this->em->createQuery($q);
        $c = $query->getResult();

        var_dump($c);die;*/
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
    }
}
