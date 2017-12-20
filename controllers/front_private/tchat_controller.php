<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->match('/tchat', function() use ($app) {
        $tchat = \Model\Propel\TchatQuery::create()->find();
        
        

    
    return $app['twig']->render('frontoffice/front_private/tchat.html.twig'
    );
}) ->bind('tchat');

$app->mount('/frontoffice', $privateGroup);



