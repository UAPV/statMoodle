app/console assets:install web
chmod 777 -R app/cache
php app/console cache:clear
chmod 777 -R app/cache
<<<<<<< HEAD
chown -R root:www-data web
=======
chown -R fanny:www-data web
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
chmod 775 -R web
