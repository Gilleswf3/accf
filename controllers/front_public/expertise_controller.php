<?php


$publicGroup->get('/expertise', function() use ($app){
    $contents = \Model\Propel\ContentQuery::create()->find();
    
    return $app['twig']->render('frontoffice/front_public/expertise.html.twig', array(
        'contents' => $contents
    ));
} )->bind('expertise');


