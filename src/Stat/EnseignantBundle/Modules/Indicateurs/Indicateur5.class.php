<?php

class Indicateur5 extends Indicateur{

    protected $titre;
    protected $type;
    protected $data;
    protected $idCours;
    protected $em;
    protected $student;

    function mesIndicateurs($idCours)
    {
        $data = array();

        //Nombre de connexions par semaine
        $data[1]['titre'] = 'Connexions';
        $data[1]['max'] = 100;
        $data[1]['type'] = 'multipleLine';
        $data[1]['indicateur1']['titre'] = 'Connexion moyenne';
        $data[1]['indicateur1']['desc'] = '(Evolution) <br/>Nombre de connexions par semaine pour l\'étudiant.';
        $data[1]['indicateur1']['fonction'] = 'getConnectionPerStudentAndCourse';

        //Devoirs rendus par semaine
        $data[2]['titre'] = 'Devoirs rendus';
        $data[2]['max'] = 2;
        $data[2]['type'] = 'multipleLine';
        $data[2]['indicateur1']['titre'] = 'Devoirs rendus';
        $data[2]['indicateur1']['desc'] = '(Evolution) <br/>Nombre de devoirs rendus par semaine pour l\'étudiant.';
        $data[2]['indicateur1']['fonction'] = 'getWorkPerStudentAndCourse';

        $this->idCours = $idCours;
        return $data;
    }


    /** FONCTIONS PERSONNALISEES */

    /**
     * @param $idCours
     * @param $nameStudent
     *
     * Retourne le nombre moyen de connexion pour l'étudiant $nameStudent et le cours $idCours
     * ainsi que la moyenne des connexions par semaine des autres étudiants
     */
    public function getConnectionPerStudentAndCourse()
    {
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy, date FROM (
                            SELECT count(mdl_log.id) AS c, mdl_user.id as userid, CONCAT(lastname,' ',firstname) as prenom,WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_log ON mdl_log.userid = mdl_user.id
                            AND mdl_log.course = mdl_course.id
                            WHERE course = ".$this->idCours."
                            AND CONCAT(lastname,'_',firstname) = '".$this->student."'
                            group by date, userid having date > 35)cnt
                            group by date, userid  ORDER BY prenom ASC
                      ";
        $results = Indicateur::executeMultipleRequete($statement);

        //On récupère une deuxième courbe qui est la moyenne des étudiants du cours
        $autres = $this->getGraphConnexionStudent($this->idCours);

        foreach($results as $r)
          $datesExistantes[$r['date']] = intval($r['moy']);
        foreach($autres as $a)
            $datesExistantesAutres[$a['date']] = intval($a['moy']);

        for($i=35;$i<51;$i++)
        {
          if(!isset($datesExistantes[$i]))
            $datesExistantes[$i] = 0;
          if(!isset($datesExistantesAutres[$i]))
              $datesExistantesAutres[$i] = 0;
        }

        sort($datesExistantes);
        sort($datesExistantesAutres);

        $data = array();
        $data['connexion_etudiant'] = $datesExistantes;
        $data['autres'] = $datesExistantesAutres;

        return $data;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe avec la moyenne des connexions étudiantes au cours par semaine
     */
    protected function getGraphConnexionStudent($idCours)
    {
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy,date FROM (
                          SELECT count(*) as c, WEEKOFYEAR(FROM_UNIXTIME(mdl_log.time)) as date
                          FROM mdl_log
                          WHERE course = ".$idCours."
                          group by date, userid having date > 35)cnt
                          group by date
                      ";
        $results = Indicateur::executeMultipleRequete($statement);

        return $results;
    }

    /**
     * @param $idCours
     * @return array
     *
     * Retourne le graphe avec la moyenne des connexions étudiantes au cours par semaine
     */
    protected function getGraphWorkshopStudent($idCours)
    {
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy,date FROM (
                          SELECT count(*) as c, WEEKOFYEAR(FROM_UNIXTIME(mdl_assignment_submissions.timecreated)) as date
                          FROM mdl_assignment_submissions
                          LEFT JOIN mdl_assignment ON mdl_assignment_submissions.assignment = mdl_assignment.id
                          WHERE course = ".$idCours."
                          group by date, userid)cnt
                          group by date
                          having date > 35
                      ";
        $results = Indicateur::executeMultipleRequete($statement);

        return $results;
    }

    /**
     * @param $idCours
     * @param $nameStudent
     *
     * Retourne le nombre moyen de devoirs rendus pour l'étudiant $nameStudent et le cours $idCours
     * ainsi que la moyenne des devoirs rendus par semaine des autres étudiants
     */
    public function getWorkPerStudentAndCourse()
    {
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy, date FROM (
                            SELECT count(*) AS c, mdl_user.id as userid, CONCAT(lastname,' ',firstname) as prenom,WEEKOFYEAR(FROM_UNIXTIME( mdl_assignment_submissions.timecreated )) as date,mdl_assignment.id AS id
                            FROM mdl_user
                            LEFT JOIN mdl_assignment_submissions ON mdl_assignment_submissions.userid = userid
                            LEFT JOIN mdl_assignment ON mdl_assignment_submissions.assignment = mdl_assignment.id
                            WHERE course = ".$this->idCours."
                            AND CONCAT(lastname,'_',firstname) = '".$this->student."'
                            group by date, userid)cnt
                            group by date, userid having date > 35 ORDER BY prenom ASC
                      ";
        $results = Indicateur::executeMultipleRequete($statement);

        //On récupère une deuxième courbe qui est la moyenne des étudiants du cours
        $autres = $this->getGraphWorkshopStudent($this->idCours);

        foreach($results as $r)
            $datesExistantes[$r['date']] = intval($r['moy']);
        foreach($autres as $a)
            $datesExistantesAutres[$a['date']] = intval($a['moy']);

        for($i=35;$i<51;$i++)
        {
            if(!isset($datesExistantes[$i]))
                $datesExistantes[$i] = 0;
            if(!isset($datesExistantesAutres[$i]))
                $datesExistantesAutres[$i] = 0;
        }

        sort($datesExistantes);
        sort($datesExistantesAutres);

        $data = array();
        $data['connexion_etudiant'] = $datesExistantes;
        $data['autres'] = $datesExistantesAutres;

        return $data;
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

    public function getStudent()
    {
        return $this->student;
    }

    public function setStudent($id)
    {
        $this->student = $id;
    }
}
?>