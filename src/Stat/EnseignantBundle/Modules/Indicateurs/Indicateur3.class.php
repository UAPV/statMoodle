<?php

class Indicateur3 extends Indicateur{

    protected $titre;
    protected $type;
    protected $data;
    protected $idCours;
    protected $em;

    function mesIndicateurs($idCours)
    {
        $data = array();

        //Récupère la moyenne des connexions étudiantes au cours par semaine
        $data[1]['titre'] = 'Connexions moyennes';
        $data[1]['max'] = 50;
        $data[1]['type'] = 'line';
        $data[1]['indicateur1']['titre'] = 'Connexion_moyenne';
        $data[1]['indicateur1']['desc'] = '(Moyenne) <br/>Moyenne des connexions des étudiants au cours, par semaine.';
        $data[1]['indicateur1']['requete'] = "SELECT ROUND(AVG(cnt.c),0) as moy,date FROM (
                          SELECT count(*) as c, WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
                          FROM mdl_log
                          WHERE course = ".$idCours."
                          group by date, userid)cnt
                          group by date";

        //Récupère le nombre de connexion moyen par ressource
        $data[2]['titre'] = 'Connexions moyennes par ressource';
        $data[2]['max'] = 50;
        $data[2]['type'] = 'column';
        $data[2]['indicateur1']['titre'] = 'connexion_moyenne_ressource';
        $data[2]['indicateur1']['desc'] = '(Moyenne) <br/>Moyenne des connexions des étudiants à une ressource, par semaine.';
        $data[2]['indicateur1']['fonction'] = "getRessourcePerWeek";

        //Récupère l'utilisation du forum
        $data[3]['titre'] = 'Utilisation forum';
        $data[3]['max'] = 50;
        $data[3]['type'] = 'column';
        $data[3]['indicateur1']['titre'] = 'Utilisation du forum';
        $data[3]['indicateur1']['desc'] = '2- (Moyenne) Pourcentage d\'étudiants ayant posté au moins 2 messages.<br/>3- (Moyenne) Pourcentage du nombre de fils de discussion ayant plus de 2 réponses.';
        $data[3]['indicateur1']['fonction']['pourcentage_participation'] = "getNbStudentForum";
        $data[3]['indicateur1']['fonction']['min_deux_messages'] = "getAvgPost";
        $data[3]['indicateur1']['requete']['nb_fils'] = "SELECT count(D.id) as moy FROM mdl_forum_discussions D WHERE D.course = ".$idCours;

        //Récupère le nombre de devoirs rendus par semaine et par devoir.
        $data[4]['titre'] = '(Evolution) <br/>Nombre de devoirs rendus par semaine et par devoir.';
        $data[4]['max'] = 50;
        $data[4]['type'] = 'line';
        $data[4]['indicateur1']['titre'] = 'Moyenne des devoirs';
        $data[4]['indicateur1']['desc'] = '(Moyenne) <br/>Moyenne des connexions des étudiants à une ressource, par semaine.';
        $data[4]['indicateur1']['requete'] = "SELECT cnt.c as moy, id, date FROM (
                            SELECT COUNT( * ) AS c, mdl_assignment.id AS id, WEEKOFYEAR( FROM_UNIXTIME( mdl_assignment_submissions.timecreated ) ) AS DATE
                            FROM  mdl_assignment_submissions
                            INNER JOIN mdl_assignment ON mdl_assignment_submissions.assignment = mdl_assignment.id
                            WHERE course = ".$idCours."
                            GROUP BY mdl_assignment.id)cnt
                            GROUP BY DATE";

        //Récupère le nombre de connexion moyen par ressource
        $data[5]['titre'] = 'Ressources cachées';
        $data[5]['max'] = 100;
        $data[5]['type'] = 'bar';
        $data[5]['indicateur1']['titre'] = 'connexion_moyenne_ressource';
        $data[5]['indicateur1']['desc'] = '(Pourcentage) <br/>Nombre de ressources cachées dans le cours par rapport au nombre de ressources disponibles.';
        $data[5]['indicateur1']['fonction'] = "getPercentageHiddenResource";

        //On définit une alerte
        $data['alerte'][1]['message'] = "Attention, connexions en baisse !";
        $data['alerte'][1]['couleur'] = array('green' => false, 'orange' => true, 'red' => true);
        $data['alerte'][1]['fonction'] = "getAlerte";
        $data['alerte'][2]['message'] = "Attention, connexions en baisse !";
        $data['alerte'][2]['couleur'] = array('green' => false, 'orange' => true, 'red' => true);
        $data['alerte'][2]['fonction'] = "getAlerte";

        $this->idCours = $idCours;
        return $data;
    }


    /** FONCTIONS PERSONNALISEES */

    public function getRessourcePerWeek()
    {
        $data = $this->getConnectionResourcePerStudent($this->idCours);
        $donnees = array();

        $donnees["titre_inclus"] = true;
        foreach($data['ressources_etudiant'] as $val)
        {
          if(isset($val['name']))
            $donnees[] = array('moy' => $val['moy'],'nom' => $val['name']);
        }

        return $donnees;
    }

    /**
     * @param $idCours
     * @param $idResource
     * @return mixed
     *
     * Retourne le nombre moyen de consultation de cours pour une ressource donnée
     */
    protected function getConnectionResourcePerStudent($idCours)
    {
        $action = 'view';
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy, cmid, name FROM (
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
                            )cnt GROUP BY cmid";
        $results = Indicateur::executeMultipleRequete($statement);
        $autres = $this->getConnectionResourceMoyenneCourse($idCours);

        $data = array();
        $data['ressources_etudiant'] = $results;
        $data['autres'] = $autres;

        return $data;
    }

    /**
     * @param $idCours
     * @return mixed
     *
     * Requête ramenant la moyenne de connexions aux ressources par semaine
     */
    protected function getConnectionResourceMoyenneCourse($idCours)
    {
        $action = 'view';
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy,date FROM (
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
                          group by date";

        $results = Indicateur::executeMultipleRequete($statement);

        return $results;
    }

    /**
     * @param $course
     *
     * Retourne le nombre d'étudiants ayant posté au moins deux
     * messages dans les nbForums / nb étudiants inscrits
     */
    public function getNbStudentForum()
    {
        $query = "SELECT count(FP.userid) FROM mdl_forum_posts FP
             INNER JOIN mdl_forum_discussions FD
             WHERE FD.course = $this->idCours
             GROUP BY FP.userid
             HAVING COUNT(FP.id) > 1";

        $nb = Indicateur::executeMultipleRequete($query);
        $nbStudent = $this->getNbStudent($this->idCours);

        if($nbStudent == 0)
            return 0;
        else
            return count($nb)/$nbStudent;
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
        $query = "SELECT count(C.id) as total FROM mdl_course C
             INNER JOIN mdl_enrol E ON E.courseid = C.id
             INNER JOIN mdl_user_enrolments UE ON UE.enrolid = E.id
             INNER JOIN mdl_user U ON U.id = UE.userid
             WHERE C.id = $course AND E.roleid = 5
        ";
        $nbEtudiant = Indicateur::executeRequete($query);

        return $nbEtudiant['total'];
    }

    /**
     * @param $idCours
     * @return mixed
     *
     * Retourne le nombre  moyen de post / nb étudiants inscrits
     */
    public function getAvgPost()
    {
        $query = "SELECT count(FP.id) as total FROM mdl_forum_posts FP
             INNER JOIN mdl_forum_discussions FD
             WHERE FD.course = $this->idCours
        ";
        $nbPost = Indicateur::executeRequete($query);
        $nbStudent = $this->getNbStudent($this->idCours);

        if($nbStudent == 0)
            return 0;
        else
            return $nbPost['total']/$nbStudent;
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de ressources cachées par rapport
     * au nombre de ressources dans le cours
     */
    public function getPercentageHiddenResource()
    {
        $query1 = "SELECT count(R.id) as total FROM mdl_resource R
            INNER JOIN mdl_url U ON R.course = U.course
            WHERE R.course = $this->idCours
            ";
        $nbRessources = Indicateur::executeRequete($query1);

        $query2 = "SELECT count(R.id) as total FROM mdl_resource R
            INNER JOIN mdl_url U ON R.course = U.course
            WHERE R.course = $this->idCours AND R.display = 6
            ";
        $nbHiddenRessources = Indicateur::executeRequete($query2);

        if($nbRessources['total'] == 0)
            return 0;
        else
            return ($nbHiddenRessources['total']/$nbRessources['total'])*100;
    }

    /**
     * Teste pour tous les étudiants du cours.
     * Si un est totalement décrocheur, on renvoit 2
     * Si un est décrocheur, on renvoit 1
     * Sinon on renvoit 0
     *
     * Renvoie OBLIGATOIREMENT un la valeur 0,1 ou 2
     */
    public function getAlerte()
    {
        return 1;
    }

    /** NE PAS TOUCHER */
    public function getIdCours()
    {
        return $this->idCours;
    }

    public function setIdCours($id)
    {
        $this->idCours = $id;
    }
}
?>