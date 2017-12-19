<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->get('/produits', function() use ($app){
    $produits = \Model\Propel\ProductsQuery::create()->find();
    return $app['twig']->render('frontoffice/front_private/produits.html.twig', array(
        'produits' => $produits
    ));
} )->bind('produits');

$app->mount('/frontoffice', $privateGroup);



