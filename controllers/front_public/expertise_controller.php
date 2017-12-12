<?php

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/expertise', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/expertise.html.twig');
} )->bind('expertise');

$app->mount('/frontoffice', $publicGroup);

