<?php

$backofficeGroup = $app['controllers_factory'];

//ROUTE DU DASHBOARD BACKOFFICE
$backofficeGroup->get('/dashboard', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/index.html.twig');
})->bind('dashboard');

//ROUTE DE LA PAGE AFFICHAGE DETAILS COMMANDE
$backofficeGroup->get('/afficher_commande', function() use ($app) {
    return $app['twig']->render('backoffice/read_order.html.twig');
})->bind('afficher_commande');

//ROUTE DE LA PAGE AFFICHAGE COMMANDES
$backofficeGroup->get('/afficher_commandes', function() use ($app) {
    return $app['twig']->render('backoffice/read_orders.html.twig');
})->bind('afficher_commandes');

//ROUTE DE LA PAGE AJOUT EMPLOYE
$backofficeGroup->get('/ajouter_employe', function() use ($app) {
    return $app['twig']->render('backoffice/create_employee.html.twig');
})->bind('ajouter_employe');

//ROUTE DE LA PAGE AFFICHAGE EMPLOYE
$backofficeGroup->get('/afficher_employe', function() use ($app) {
    return $app['twig']->render('backoffice/read_employee.html.twig');
})->bind('afficher_employe');

//ROUTE DE LA PAGE MISE A JOUR EMPLOYE
$backofficeGroup->get('/mettre_a_jour_employe', function() use ($app) {
    return $app['twig']->render('backoffice/update_employee.html.twig');
})->bind('mettre_a_jour_employe');

//ROUTE DE LA PAGE SUPPRESSION EMPLOYE
$backofficeGroup->get('/supprimer_employe', function() use ($app) {
    return $app['twig']->render('backoffice/delete_employee.html.twig');
})->bind('supprimer_employe');


$backofficeGroup->get('/commandes', function() use ($app) {
    return $app['twig']->render('backoffice/orders.html.twig');
});


$app->mount('/backoffice', $backofficeGroup);