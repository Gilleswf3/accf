<?php



$privateGroup->get('/hotline', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/hotline.html.twig');
} )->bind('hotline');


//$extract = extract($_SESSION['id_customer']);
//$messages = new Messages();
//$messages->setMessage($_POST['_message']);
//$messages->save();

