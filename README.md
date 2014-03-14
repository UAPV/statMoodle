statMoodle
==========

* Récupérer des sources

git clone git@github.com:UAPV/statMoodle.git
cd statMoodle


* Création d'un dossier logs/ et cache/

Créer deux dossiers dans "app" : cache et logs. Il devront avoir les droits de lecture et écriture pour le user www-data.



* Modification de la connexion à la base de données

Ouvrir le fichier "app > config > config_dev.php", modifier la partie "Doctrine Configuration" et entrer vos parametres.
Si vous utilisez la base de données du Système d'Information, vous pouvez indiquer ces paramètres dans "appig"

Une fois ceci fait, il va falloir configurer le CAS et le LDAP pour s'authentifier à l'application.
Dans la partie "dosi_auth", modifiez l'url de login/logout/validation avec vos urls ainsi que ce client, le user et le host.

Idem, modifier la configuration de la partie "swiftmailer".
