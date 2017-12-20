<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->get('/produits', function() use ($app){
    $products = \Model\Propel\ProductsQuery::create()->find();
        $medicale = Model\Propel\ProductsQuery::create()
            ->filterByProductMainCategory('Dispositifs de prevention medicale')
            ->find();

        $incendie = Model\Propel\ProductsQuery::create()
            ->filterByProductMainCategory('Dispositifs anti-incendie')
            ->find();
        $securite = Model\Propel\ProductsQuery::create()
            ->filterByProductMainCategory('Dispositifs anti-intrusion')
            ->find();

        
    return $app['twig']->render('frontoffice/front_private/produits.html.twig', array(
        'products' => $products,
        'medicale' => $medicale,
        'incendie' => $incendie,
        'securite' => $securite,
        
            
    ));
} )->bind('produits');

$app->mount('/frontoffice', $privateGroup);



