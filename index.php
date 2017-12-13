<?php 

require_once './vendor/autoload.php';
require_once 'config_propel.php';

$app = new Silex\Application();

$app['debug'] = true;

define('RACINE_SITE', 'accf2/assets/images');

require_once './Model/services.php';

require_once './controllers/backoffice/dashboard_controller.php';
require_once 'controllers/front_private/profile_controller.php';
require_once 'controllers/front_public/accueil_controller.php';
require_once 'controllers/front_public/expertise_controller.php';
require_once 'controllers/front_private/produits_controller.php';
require_once 'controllers/front_public/contact_controller.php';
require_once 'controllers/front_public/mentions_controller.php';

$app->run();