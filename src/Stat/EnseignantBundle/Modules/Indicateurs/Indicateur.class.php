<?php
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;

/**
 * Created by PhpStorm.
 * User: fanny
 * Date: 19/03/14
 * Time: 15:42
 */

abstract class Indicateur {

    private static $em;
    //private static $emSI;

    public abstract function mesIndicateurs($idCours);

    /* On ajoute le paramètre $emSI si on utilise une bdd externe */
    static public function setEntityManager(ObjectManager $em)
    {
        self::$em = $em;
        //self::$emSI = $emSI;
    }

    static function executeRequete($req)
    {
        $connection = self::$em->getConnection('moodle');
        $statement = $connection->prepare($req);
        $statement->execute();
        $results = $statement->fetchAll();

        return $results[0];
    }

    static function executeMultipleRequete($req)
    {
        $connection = self::$em->getConnection('moodle');
        $statement = $connection->prepare($req);
        $statement->execute();
        $results = $statement->fetchAll();

        return $results;
    }

    static function getRepoCours($id)
    {
        return self::$em->getRepository('StatEnseignantBundle:MdlCourse')->find($id);
    }

    static function getNbEtudiantsSI($id)
    {
        return 1;

       // méthode à implémenter dans le fichier "Modules/Fonctions.php" pour un appel à une fonction du SI
       // return $nbEtudiantSI = self::$emSI->getNbStudentInCourse($id);
    }

    static function getComposantes()
    {
        return 1;

        // méthode à implémenter dans le fichier "Modules/Fonctions.php" pour un appel à une fonction du SI
        //return self::$emSI->getComposantes();
    }

    static function getFilieres($composante)
    {
        return 1;

        // méthode à implémenter dans le fichier "Modules/Fonctions.php" pour un appel à une fonction du SI
        //return self::$emSI->getFilieres($composante);
    }

    static function getDiplomes($filiere)
    {
        return 1;

        // méthode à implémenter dans le fichier "Modules/Fonctions.php" pour un appel à une fonction du SI
        // return self::$emSI->getDiplomes($filiere);
    }

    static function getMatieres($diplome)
    {
        return 1;

        // méthode à implémenter dans le fichier "Modules/Fonctions.php" pour un appel à une fonction du SI
        //return self::$emSI->getMatieres($diplome);
    }

    static function getInfosUE($code)
    {
        return 1;

        // méthode à implémenter dans le fichier "Modules/Fonctions.php" pour un appel à une fonction du SI
        //return self::$emSI->getInfosUE($code);
    }
} 