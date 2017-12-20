<?php
//Route de contact FRONTOFFICE

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/inscription', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/inscription.html.twig');
} )->bind('inscription');

$app->mount('/frontoffice', $publicGroup);
