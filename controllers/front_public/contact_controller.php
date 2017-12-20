<?php

$publicGroup = $app['controllers_factory'];

$publicGroup->get('/contact', function() use ($app) {
    $employeess = Model\Propel\EmployeesQuery::create()->find();
    $agencies = Model\Propel\AgenciesQuery::create()->find();
    
    return $app['twig']->render('frontoffice/front_public/contact.html.twig', array(
    'employeess' => $employeess, 'agencies' =>$agencies
    )
    );
})->bind('contact');

$app->mount('/frontoffice', $publicGroup);
