<?php 

require_once './vendor/autoload.php';
require_once 'config_propel.php';

$app = new Silex\Application();

$app['debug'] = true;

require_once './Model/services.php';

require_once './controllers/backoffice/dashboard_controller.php';

$app->run();