<?php

class Indicateur4 extends Indicateur{

    protected $titre;
    protected $type;
    protected $data;
    protected $idCours;
    protected $em;

    function mesIndicateurs($idCours)
    {
        $data = array();

        //Affiche les graphes étudiants
        $data[1]['titre'] = 'Connexions';
        $data[1]['max'] = 50;
        $data[1]['type'] = 'line';
        $data[1]['indicateur1']['titre'] = 'Connexion_moyenne';
        $data[1]['indicateur1']['desc'] = '(Moyenne) <br/>Moyenne des connexions des étudiants au cours, par semaine.';
        $data[1]['indicateur1']['fonction']['connection'] = 'getActiveResourcePerStudent';
        $data[1]['indicateur1']['fonction']['connection_ressources'] = 'getConnectionResourcePerStudent';


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

    public function getConnectionResourcePerStudent()
    {
        $action = 'view';
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy,userid, prenom FROM (
                            SELECT count(mdl_log.id) AS c, mdl_log.userid as userid, CONCAT(lastname,' ',firstname) as prenom
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_course_modules ON mdl_course_modules.course = mdl_course.id
                            LEFT JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                            LEFT JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                            LEFT JOIN mdl_log ON mdl_log.course=mdl_course.id AND mdl_log.userid=mdl_user.id
                            WHERE mdl_course.id = ".$this->idCours."
                            AND mdl_modules.id IN (15,18)
                            AND mdl_resource.display != 6
                            AND action = '".$action."'
                            AND roleid IN (5)
                            GROUP BY userid
                            )cnt GROUP BY userid  ORDER BY prenom ASC";
        $results = Indicateur::executeMultipleRequete($statement);

        $data = array();
        $data['ressources_etudiant'] = $results;

        $data = array();
        foreach($results as $etudiant)
            $data[$etudiant['prenom']] = intval($etudiant['moy']);

        return $data;
    }

    /**
     * @param $idCours
     *
     * Retourne la moyenne du pourcentage d'utilisateurs
     * se connectant chaque semaine au cours
     */
    public function getActiveResourcePerStudent()
    {
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy, userid, prenom FROM (
                            SELECT count(mdl_log.id) AS c, mdl_user.id as userid, CONCAT(lastname,' ',firstname) as prenom
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_log ON mdl_log.userid = mdl_user.id
                            AND mdl_log.course = mdl_course.id
                            WHERE mdl_course.id = ".$this->idCours."
                            AND roleid in (5)
                            GROUP BY weekofyear( time ) , userid
                            )cnt GROUP BY userid ORDER BY prenom ASC";
        $results = Indicateur::executeMultipleRequete($statement);
        $autres = $this->getPercentageConnection($this->idCours);

        $data = array();
        foreach($results as $r)
            $data[$r['prenom']] = round(($r['moy']*100)/$autres,1);

        return $data;
    }

    /**
     * @param $idCours
     *
     * Retourne la moyenne d'utilisateurs
     * se connectant chaque semaine au cours
     */
    protected function getPercentageConnection($idCours)
    {
        $statement = "SELECT ROUND(AVG(cnt.c),0) as total FROM (
                            SELECT count(*) AS c
                            FROM mdl_log
                            WHERE mdl_log.course = ".$idCours."
                            GROUP BY weekofyear( time ) , userid
                            )cnt
                      ";
        $results = Indicateur::executeRequete($statement);

        return $results['total'];
    }

    /**
     * Teste pour tous les étudiants du cours.
     * Si un est totalement décrocheur, on renvoit 2
     * Si un est décrocheur, on renvoit 1
     * Sinon on renvoit 0
     *
     * Renvoie OBLIGATOIREMENT un tableau avec étudiant <=> 0,1 ou 2
     */
    public function getAlerte()
    {
        $action = 'view';
        $statement = "SELECT ROUND(AVG(cnt.c),0) as moy,userid, prenom FROM (
                            SELECT count(mdl_log.id) AS c, mdl_log.userid as userid, CONCAT(lastname,' ',firstname) as prenom
                            FROM mdl_user
                            LEFT JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid
                            LEFT JOIN mdl_context ON mdl_role_assignments.contextid = mdl_context.id
                            LEFT JOIN mdl_course ON mdl_context.instanceid = mdl_course.id
                            LEFT JOIN mdl_course_modules ON mdl_course_modules.course = mdl_course.id
                            LEFT JOIN mdl_modules ON mdl_modules.id = mdl_course_modules.module
                            LEFT JOIN mdl_resource ON mdl_resource.id = mdl_course_modules.instance
                            LEFT JOIN mdl_log ON mdl_log.course=mdl_course.id AND mdl_log.userid=mdl_user.id
                            WHERE mdl_course.id = ".$this->idCours."
                            AND mdl_modules.id IN (15,18)
                            AND mdl_resource.display != 6
                            AND action = '".$action."'
                            AND roleid IN (5)
                            GROUP BY userid
                            )cnt GROUP BY userid  ORDER BY prenom ASC";
        $results = Indicateur::executeMultipleRequete($statement);

        $data = array();
        $data['ressources_etudiant'] = $results;

        $data = array();
        foreach($results as $etudiant)
        {
            switch($etudiant['moy'])
            {
                case ($etudiant['moy'] < 10):
                  $val = 0;
                  break;
                case ($etudiant['moy'] < 50):
                  $val = 1;
                  break;
                case ($etudiant['moy'] > 50):
                  $val = 2;
                  break;
            }
            $data[$etudiant['prenom']] = $val;
        }

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
}
?>