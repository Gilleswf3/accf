<?php

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/accueil', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/accueil.html.twig');
} )->bind('accueil');

$app->mount('/frontoffice', $publicGroup);


