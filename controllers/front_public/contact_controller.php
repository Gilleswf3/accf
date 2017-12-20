<?php


$publicGroup->get('/contact', function() use ($app){
    $employeess = Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('frontoffice/front_public/contact.html.twig', array(
        'employeess'=>$employeess
    ));
} )->bind('contact');

