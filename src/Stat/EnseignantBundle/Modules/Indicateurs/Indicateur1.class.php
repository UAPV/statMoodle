<?php

class Indicateur1 extends Indicateur{

    protected $titre;
    protected $type;
    protected $data;
    protected $idCours;
    protected $em;

    function mesIndicateurs($idCours)
    {
        $data = array();

        //Premier indicateur
        $data[1]['type'] = 'spider';
        $data[1]['titre'] = 'Utilisation TICE';
        //Récupère le nombre total de ressources pour un cours
        $data[1]['indicateur1']['titre'] = 'Ressources';
        $data[1]['indicateur1']['desc'] = 'Les Ressources';
        $data[1]['indicateur1']['requete'] = "SELECT COUNT(R.id)+(SELECT COUNT( U.id ) FROM mdl_url U WHERE U.course = $idCours AND U.display !=6 ) AS moy FROM mdl_resource R WHERE R.course = $idCours AND R.display !=6;";
        //Récupère le nombre total de ressources structurées (étiquette, glossaire) pour un cours
        $data[1]['indicateur2']['titre'] = 'Ressources structurees';
        $data[1]['indicateur2']['desc'] = 'Les Ressources structurees';
        $data[1]['indicateur2']['requete'] = "SELECT COUNT(G.id)+(SELECT COUNT(L.id) FROM mdl_label L WHERE L.course = $idCours ) AS moy FROM mdl_glossary G WHERE G.course = $idCours";
        //Récupère le nombre total de rendus (devoir, test, atelier) pour un cours
        $data[1]['indicateur3']['titre'] = 'Rendus (au moins un)';
        $data[1]['indicateur3']['desc'] = 'Les rendus';
        $data[1]['indicateur3']['requete'] = "SELECT COUNT(DISTINCT A.id)+(SELECT count(L.id) FROM mdl_lesson L WHERE L.course = $idCours)+(SELECT count(W.id) FROM mdl_workshop W WHERE W.course = $idCours) AS moy FROM mdl_assignment A          INNER JOIN mdl_assignment_submissions S ON A.id = S.assignment WHERE A.course = $idCours AND S.numfiles > 0";
        //Récupère le nombre total de discussions dans les forums pour un cours
        $data[1]['indicateur4']['titre'] = 'Sujets dans les forums';
        $data[1]['indicateur4']['desc'] = 'Les sujets dans les forums';
        $data[1]['indicateur4']['requete'] = "SELECT count(D.id) AS moy FROM mdl_forum_discussions D WHERE D.course = $idCours";
        //Récupère le nombre d'inscrits pour un cours
        $data[1]['indicateur5']['titre'] = 'Inscriptions';
        $data[1]['indicateur5']['desc'] = 'Les inscriptions';
        $data[1]['indicateur5']['requete'] = "SELECT count(C.id) AS moy FROM mdl_course C INNER JOIN mdl_enrol E ON E.courseid = C.id INNER JOIN mdl_user_enrolments UE ON UE.enrolid = E.id INNER JOIN mdl_user U ON U.id = UE.userid WHERE C.id = $idCours AND E.roleid = 5";

        //Deuxième indicateur
        $data[2]['type'] = 'spider';
        $data[2]['titre'] = 'Cours actif';
        //Récupère la moyenne d'utilisateurs se connectant chaque semaine au cours
        $data[2]['indicateur1']['titre'] = 'Connexion';
        $data[2]['indicateur1']['desc'] = 'Les connexions';
        $data[2]['indicateur1']['requete'] = "SELECT ROUND(AVG(cnt.c),0) as moy FROM (SELECT count(*) AS c FROM mdl_log WHERE mdl_log.course = ".$idCours." GROUP BY weekofyear( time ) , userid)cnt";
        //Retourne le nombre moyen de consultations de cours
        $data[2]['indicateur2']['titre'] = 'Consultation des ressources';
        $data[2]['indicateur2']['desc'] = 'Les consultation des ressources';
        $data[2]['indicateur2']['requete'] = "SELECT ROUND(AVG(cnt.c),0) as moy FROM (
                SELECT count(*) AS c
                FROM mdl_log
                INNER JOIN mdl_course_modules ON mdl_course_modules.id = mdl_log.cmid
                INNER JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                INNER JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                WHERE mdl_log.course = ".$idCours."
                AND mdl_modules.id IN (15,18)
                AND mdl_resource.display != 6
                AND action = 'view'
                GROUP BY userid
                )cnt";
        $data[2]['indicateur3']['titre'] = 'Feedback';
        $data[2]['indicateur3']['desc'] = 'Les feedback';
        $data[2]['indicateur3']['fonction'] = 'getPercentageFeedback';
        $data[2]['indicateur4']['titre'] = 'Rendus';
        $data[2]['indicateur4']['desc'] = 'Les rendus';
        $data[2]['indicateur4']['fonction'] = 'getPercentageAssignment';
        $data[2]['indicateur5']['titre'] = 'Communication';
        $data[2]['indicateur5']['desc'] = 'Les communications (forum)';
        $data[2]['indicateur5']['fonction'] = 'getAvgPost';


        //On définit une alerte
        $data['alerte'][1]['message'] = "Attention, connexions en baisse !";
        $data['alerte'][1]['couleur'] = array('green' => false, 'orange' => true, 'red' => true);
        $data['alerte'][1]['fonction'] = "getAlerte";

        $this->idCours = $idCours;
        return $data;
    }





    /** FONCTIONS PERSONNALISEES */

    /**
     * @param $idCours
     *
     * Retourne le taux de réponses par rapport au nombre d'inscrits
     */
    public function getPercentageFeedback()
    {
        $query = " SELECT COUNT(FC.userid) as total FROM mdl_feedback_completed FC
              INNER JOIN mdl_feedback F ON F.id = FC.feedback
              WHERE F.course = $this->idCours
            ";

        $nbReponses = Indicateur::executeRequete($query);

        if($nbReponses['total'] == 0)
            return 0;
        else
        {
            $nbInscrit = $this->getNbStudent($this->idCours);
            return ($nbInscrit/$nbReponses['total'])*100;
        }
    }

    /**
     * @param $idCours
     * @return float|int
     *
     * Retourne le pourcentage de devoirs rendus par rapport au nombre d'inscrits (* le nombre de dépôt)
     */
    public function getPercentageAssignment()
    {
        $query = "SELECT COUNT(AsS.id) as total FROM mdl_assignment_submissions AsS
              INNER JOIN mdl_assignment A ON AsS.assignment = A.id
              WHERE A.course = $this->idCours
            ";

        $nbRendus = Indicateur::executeRequete($query);
        $nbDepot = $this->getNbAssignmentDepot();

        if($nbRendus['total'] == 0)
            return 0;
        else
        {
            $nbInscrit = $this->getNbStudent();
            return ($nbInscrit*$nbDepot/$nbRendus['total'])*100;
        }
    }

    /**
     * @param $idCours
     * @return mixed
     *
     * Retourne le nombre de dépôts de devoirs dans le cours
     */
    protected function getNbAssignmentDepot()
    {
        $query = "SELECT COUNT(A.id) as total FROM mdl_assignment A
              WHERE A.course = $this->idCours
            ";
        $nbDevoirs = Indicateur::executeRequete($query);

        return $nbDevoirs['total'];
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre d'étudiants inscrits dans le cours
     */
    protected function getNbStudent()
    {
        //Nombre d'étudiants inscrits sur Moodle dans ce cours
        $query = "SELECT count(C.id) as total FROM mdl_course C
             INNER JOIN mdl_enrol E ON E.courseid = C.id
             INNER JOIN mdl_user_enrolments UE ON UE.enrolid = E.id
             INNER JOIN mdl_user U ON U.id = UE.userid
             WHERE C.id = $this->idCours AND E.roleid = 5
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
        $nbStudent = $this->getNbStudent();

        if($nbStudent == 0)
            return 0;
        else
            return $nbPost['total']/$nbStudent;
    }

    /**
     * Teste pour tous les étudiants du cours.
     * Si un est totalement décrocheur, on renvoit 2
     * Si un est décrocheur, on renvoit 1
     * Sinon on renvoit 0
     *
     * Renvoie OBLIGATOIREMENT un tableau clé valeur avec tous les cours
     */
    public function getAlerte()
    {
        $tableau = array();
        $tableau['56'] = 2;
        $tableau['76'] = 1;
        $tableau['77'] = 1;
        $tableau['29'] = 0;
        $tableau['55'] = 0;
        $tableau['815'] = 0;
        $tableau['816'] = 2;

        return $tableau;
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