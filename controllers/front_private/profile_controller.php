<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->get('/profile', function() use ($app) {
    return $app['twig']->render('frontoffice/front_private/profile.html.twig');
})->bind('profile');

$app->mount('/frontoffice', $privateGroup);
