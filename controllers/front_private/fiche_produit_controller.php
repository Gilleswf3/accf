<?php

$privateGroup = $app['controllers_factory'];

$privateGroup->match('/fiche_produit/{id}', function($id) use ($app) {
        $product = \Model\Propel\ProductsQuery::create()->findOneByIdProduct($id);
        
    return $app['twig']->render('frontoffice/front_private/fiche_produit.html.twig',array(
        'product' => $product
    ));
}) ->bind('fiche_produit');

$app->mount('/frontoffice', $privateGroup);

