<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->match('/category/{subCategory}', function($subCategory) use ($app) {
        $products = \Model\Propel\ProductsQuery::create()->findByProductSubCategory($subCategory);
        
    return $app['twig']->render('frontoffice/front_private/categorie.html.twig',array(
        'products' => $products
    ));
}) ->bind('category');

$app->mount('/frontoffice', $privateGroup);

