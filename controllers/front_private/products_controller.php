<?php


$privateGroup->get('/produits', function() use ($app){
    $produits = \Model\Propel\ProductsQuery::create()->find();
    return $app['twig']->render('frontoffice/front_private/products.html.twig', array(
        'products' => $produits
    ));
} )->bind('products');



