<?php

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/profile', function() use ($app){
    $customers = \Model\propel\CustomersQuery::create()->find();
    
 
    
    
    return $app['twig']->render('frontoffice/front_public/connexion.html.twig', array(
        'customers' => $customers
    ));
} )->bind('profile');


$app->mount('/frontoffice', $publicGroup);


