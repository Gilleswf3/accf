<?php


$privateGroup = $app['controllers_factory'];

$privateGroup->get('/hotline', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/hotline.html.twig');
} )->bind('hotline');

$app->mount('/frontoffice', $privateGroup);

//$extract = extract($_SESSION['id_customer']);
//$messages = new Messages();
//$messages->setMessage($_POST['_message']);
//$messages->save();

