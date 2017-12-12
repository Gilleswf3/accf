<?php

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/contact', function() use ($app){
    return $app['twig']->render('frontoffice/front_public/contact.html.twig');
} )->bind('contact');

$app->mount('/frontoffice', $publicGroup);
