<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->get('/produits', function() use ($app){
    return $app['twig']->render('frontoffice/front_private/produits.html.twig');
} )->bind('produits');

$app->mount('/frontoffice', $privateGroup);



