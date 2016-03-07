<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$loader = require __DIR__ . "/../vendor/autoload.php";
<<<<<<< HEAD
$loader->add('Monolog\\', __DIR__);
=======
$loader->addPsr4('Monolog\\', __DIR__.'/Monolog');

date_default_timezone_set('UTC');
>>>>>>> 9ba0bb3b0b37b6e5e4f7f164eb73874931d666b7
