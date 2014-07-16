<?php

class Indicateur2 extends Indicateur{

    protected $titre;
    protected $type;
    protected $data;
    protected $idCours;
    protected $em;

    function mesIndicateurs($idCours)
    {
        $data = array();

        //Récupère le nombre de chaque ressources pour un cours
        $data[1]['titre'] = 'Ressources totales';
        $data[1]['max'] = 10;
        $data[1]['type'] = 'column';
        $data[1]['indicateur1']['titre'] = 'Ressources';
        $data[1]['indicateur1']['desc'] = 'Les Ressources';
        $data[1]['indicateur1']['requete']['pdf'] = "SELECT COUNT( R.id ) as moy FROM mdl_resource R WHERE R.course = $idCours AND R.display != 6";
        $data[1]['indicateur1']['requete']['liens_externes'] = "SELECT COUNT( U.id ) as moy FROM mdl_url U WHERE U.course = $idCours AND U.display != 6";

        //Récupère le nombre total de ressources structurées (étiquette, glossaire) pour un cours
        $data[2]['titre'] = 'Ressources structurées totales';
        $data[2]['max'] = 10;
        $data[2]['type'] = 'column';
        $data[2]['indicateur1']['titre'] = 'Ressources structurées';
        $data[2]['indicateur1']['desc'] = 'Les Ressources structurées';
        $data[2]['indicateur1']['requete']['etiquette'] = "SELECT COUNT(L.id) as moy FROM mdl_label L WHERE L.course = $idCours";
        $data[2]['indicateur1']['requete']['bdd'] = "SELECT count(D.id) as moy FROM mdl_data D WHERE D.course = $idCours";
        $data[2]['indicateur1']['requete']['glossaire'] = "SELECT COUNT(G.id) as moy FROM mdl_glossary G WHERE G.course = $idCours";

        //Récupère le nombre total de rendus (devoir, test, atelier) pour un cours
        $data[3]['titre'] = 'Nombre total de rendus';
        $data[3]['max'] = 10;
        $data[3]['type'] = 'column';
        $data[3]['indicateur1']['titre'] = 'Rendus (au moins un)';
        $data[3]['indicateur1']['desc'] = 'Les rendus';
        $data[3]['indicateur1']['requete']['devoir'] = "SELECT COUNT(DISTINCT A.id) as moy FROM mdl_assignment A
                                                        INNER JOIN mdl_assignment_submissions S ON A.id = S.assignment
                                                        WHERE A.course = $idCours AND S.numfiles > 0";
        $data[3]['indicateur1']['requete']['test'] = "SELECT count(L.id) as moy FROM mdl_lesson L WHERE L.course = $idCours";
        $data[3]['indicateur1']['requete']['atelier'] = "SELECT count(W.id) as moy FROM mdl_workshop W WHERE W.course = $idCours";

        //Récupère le nombre d'inscrits pour un cours
        $data[4]['type'] = 'bar';
        $data[4]['titre'] = 'Ressources structurées totales';
        $data[4]['max'] = 100;
        $data[4]['indicateur1']['titre'] = 'Inscriptions';
        $data[4]['indicateur1']['desc'] = 'Les inscriptions';
        $data[4]['indicateur1']['fonction'] = "getPercentageStudent";

        //Récupère le nombre total de ressources cachées par rapport au nombre total de ressources
        $data[5]['type'] = 'bar';
        $data[5]['titre'] = 'Ressources cachées';
        $data[5]['max'] = 100;
        $data[5]['indicateur1']['titre'] = 'Ressources_cachées';
        $data[5]['indicateur1']['desc'] = '(Pourcentage) <br/>Nombre de ressources cachées dans le cours par rapport au nombre de ressources disponibles.';
        $data[5]['indicateur1']['requete'] = "SELECT count(D.id) AS moy FROM mdl_forum_discussions D WHERE D.course = $idCours";


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

    /**
     * @param $course
     * @return float|int
     * @throws
     *
     * Retourne le nombre d'étudiants inscrit dans le cours
     * par rapport au nombre d'étudiants inscrits pédagogiquement
     */
    public function getPercentageStudent()
    {
        //Nombre d'étudiants inscrits sur Moodle dans ce cours
        $query = "SELECT count(C.id) as total FROM mdl_course C
             INNER JOIN mdl_enrol E ON E.courseid = C.id
             INNER JOIN mdl_user_enrolments UE ON UE.enrolid = E.id
             INNER JOIN mdl_user U ON U.id = UE.userid
             WHERE C.id = $this->idCours
        ";
        $nbEtudiant = Indicateur::executeRequete($query);

        //Nombre d'étudiants inscrits pédagogiquement à ce cours dans le SI
        $cours = Indicateur::getRepoCours($this->idCours);

        if($cours === null)
            throw new NotFoundHttpException('Le cours [id='.$this->idCours.'] n\'existe pas.');

        $nbEtudiantSI = Indicateur::getNbEtudiantsSI($cours->getIdNumber());

        //On retourne le pourcentage
        if($nbEtudiantSI['count'] == 0)
            return 0;
        else
            return ($nbEtudiant ["total"]/$nbEtudiantSI["count"])*100;
    }

    /**
     * @param $course
     * @return mixed
     *
     * Retourne le nombre de ressources cachées par rapport
     * au nombre de ressources dans le cours
     */
    public  function getPercentageHiddenResource($course)
    {
        $query = "SELECT count(R.id) FROM mdl_resource R
            INNER JOIN mdl_url U ON R.course = U.course
            WHERE R.course = $course
        ";
        $nbRessources = Indicateur::executeRequete($query);

        $query = "SELECT count(R.id) FROM mdl_resource R
            INNER JOIN mdl_url U ON R.course = U.course
            WHERE R.course = $course
        ";
        $nbHiddenRessources = Indicateur::executeRequete($query);

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