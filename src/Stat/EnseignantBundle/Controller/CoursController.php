<?php
/**
 * Created by PhpStorm.
 * User: fanny
 * Date: 11/02/14
 * Time: 15:39
 */

namespace Stat\EnseignantBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoursController extends Controller
{
    protected $type = array('1' => 'getDataCoursTice','2' => 'getDataCoursActif');

    /**
     * @return Response
     *
     * Affiche la totalité des cours du user authentifié
     */
    public function indexAction()
    {
        // On récupère le service
        $stats = $this->container->get('stat_enseignant.modules');
        //$uid = $this->getUser()->getAttribute('uid');
        //$data = $stats->getCourseByUser($uid);
        $data = $stats->getCourseByUser('spriet');
        $compteur = 0;

        return $this->render('StatEnseignantBundle:Cours:index.html.twig', array(
            'data' => $data, 'compteur' => $compteur
        ));
    }

    /**
     * @param $id, id du cours à afficher
     * @param $type, index du type d'indicateur à afficher
     * @return Response
     */
    public function detailsAction($id, $type)
    {
        $fonction = $this->type[$type].'Details';
        $stats = $this->container->get('stat_enseignant.modules');
        $data = $stats->$fonction($id);

        return $this->render('StatEnseignantBundle:Cours:details.html.twig', array(
            'data' => $data
        ));
    }

    public function detailsActifAction($id, $type)
    {
        $fonction = $this->type[$type].'Details';
        $stats = $this->container->get('stat_enseignant.modules');
        $data = $stats->$fonction($id);

        return $this->render('StatEnseignantBundle:Cours:details_actif.html.twig', array(
            'data' => $data, 'id' => $id
        ));
    }

    public function globalAction($id)
    {
        $stats = $this->container->get('stat_enseignant.modules');
        $data = $stats->getDataGlobalStudent($id);
        $titre = 'Etudiants du cours';
        $url = $this->get('router')->generate('stat_enseignant_etudiant_detail', array(), true);

        return $this->render('StatEnseignantBundle:Etudiant:details.html.twig', array(
            'data' => $data, 'titre' => $titre, 'url' => $url, 'id' => $id
        ));
    }

    public function detailsEtudiantAction($cours,$name)
    {
        $stats = $this->container->get('stat_enseignant.modules');
        $data = $stats->getDataDetailsStudent($name,$cours);

        return $this->render('StatEnseignantBundle:Etudiant:details_perso.html.twig', array(
            'data' => $data, 'name' => $name
        ));
    }
}
