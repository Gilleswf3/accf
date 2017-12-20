<?php

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/mentions', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/mentions.html.twig');
} )->bind('mentions');

$app->mount('/frontoffice', $publicGroup);


