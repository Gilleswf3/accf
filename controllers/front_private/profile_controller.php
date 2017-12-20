<?php

use Symfony\Component\HttpFoundation\Request;


$privateGroup = $app['controllers_factory'];


//$privateGroup->get('/profile', function() use ($app) {
//    return $app['twig']->render('frontoffice/front_private/profile.html.twig');
//})->bind('profile');




$app->match('/profile', function(Request $request) use ($app) {
    return $app['twig']->render('frontoffice/front_private/profile.html.twig', 
            ['error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
                ]);
})->bind('profile');
$app->mount('/frontoffice', $privateGroup);