<?php

$backofficeGroup = $app['controllers_factory'];

//ROUTE DU DASHBOARD BACKOFFICE
$backofficeGroup->get('/dashboard', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/index.html.twig');
})->bind('dashboard');

//ROUTE DU DASHBOARD LOGIN
$backofficeGroup->match('/login', function() use ($app) {
    $authorizedUsers = \Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('backoffice/login.html.twig', array(
        'authorizedUsers' => $authorizedUsers
));
})->bind('login');


//ROUTE DE LA PAGE CREATION AGENCE
$backofficeGroup->match('/ajouter_agence', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/agencies/create_agency.html.twig');
})->bind('ajouter_agence');

//ROUTE DE LA PAGE MISE A JOUR AGENCE
$backofficeGroup->match('/modifier_agence', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/agencies/update_agency.html.twig');
})->bind('modifier_agence');

//ROUTE DE LA PAGE AFFICHAGE AGENCE
$backofficeGroup->get('/afficher_agence', function() use ($app) {
    $agencies = \Model\Propel\AgenciesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/agencies/read_agency.html.twig', array(
        'agencies' => $agencies
    ));
})->bind('afficher_agence');

//ROUTE DE LA PAGE SUPPRESSION AGENCE
$backofficeGroup->get('/supprimer_agence', function() use ($app) {
    $agencies = \Model\Propel\AgenciesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/agencies/delete_agency.html.twig', array(
        'agencies' => $agencies
    ));
})->bind('supprimer_agence');


//ROUTE DE LA PAGE AFFICHAGE DETAILS CLIENT
$backofficeGroup->get('/afficher_client', function() use ($app) {
    $customers = \Model\Propel\CustomersQuery::create()->find();    
    return $app['twig']->render('backoffice/dashboard/customers/read_customer.html.twig', array(
    'customers' => $customers
    ));
})->bind('afficher_client');

//ROUTE DE LA PAGE AFFICHAGE CLIENTS
$backofficeGroup->get('/afficher_clients', function() use ($app) {
    $customers = \Model\Propel\CustomersQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/customers/read_customers.html.twig', array(
        'customers' => $customers
    ));
})->bind('afficher_clients');


//ROUTE DE LA PAGE AFFICHAGE DETAILS COMMANDE
$backofficeGroup->get('/afficher_commande', function() use ($app) {
    $orders = \Model\Propel\OrdersQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/orders/read_order.html.twig', array(
        'orders' => $orders
    ));
})->bind('afficher_commande');

//ROUTE DE LA PAGE AFFICHAGE COMMANDES
$backofficeGroup->get('/afficher_commandes', function() use ($app) {
    $orders = \Model\Propel\OrdersQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/orders/read_orders.html.twig', array(
        'orders' => $orders
    ));
})->bind('afficher_commandes');

//ROUTE DE LA PAGE AJOUT EMPLOYE
$backofficeGroup->match('/employes/ajouter_employe', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/employees/create_employee.html.twig');
})->bind('ajouter_employe');

//ROUTE DE LA PAGE AFFICHAGE EMPLOYE
$backofficeGroup->get('/employes/afficher_employe', function() use ($app) {
    $employees = \Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/employees/read_employee.html.twig', array(
        'employees' => $employees
    ));
})->bind('afficher_employe');

//ROUTE DE LA PAGE MISE A JOUR EMPLOYE
$backofficeGroup->match('/employes/mettre_a_jour_employe', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/employees/update_employee.html.twig');
})->bind('mettre_a_jour_employe');

//ROUTE DE LA PAGE SUPPRESSION EMPLOYE
$backofficeGroup->get('/employees/supprimer_employe', function() use ($app) {
    $employees = \Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/employees/delete_employee.html.twig', array(
        'employees' => $employees
    ));
})->bind('supprimer_employe');


//ROUTE DE LA PAGE AJOUTER PUBLICATION
$backofficeGroup->get('/standards/ajouter_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/create_standard.html.twig');
})->bind('ajouter_publication');

//ROUTE DE LA PAGE SUPPRIMER PUBLICATION
$backofficeGroup->get('/standards/supprimer_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/delete_standard.html.twig');
})->bind('supprimer_publication');

//ROUTE DE LA PAGE MODIFIER PUBLICATION
$backofficeGroup->get('/standards/modifier_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/update_standard.html.twig');
})->bind('modifier_publication');

//ROUTE DE LA PAGE AFFICHER PUBLICATION
$backofficeGroup->get('/standards/afficher_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/read_standard.html.twig');
})->bind('afficher_publication');


$backofficeGroup->get('/products/create_products', function() use ($app) {
    return $app['twig']->render('/backoffice/dashboard/products/create_products.html.twig');
})->bind('create_products');

$backofficeGroup->get('/products/read_products', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/products/read_products.html.twig');
})->bind('read_products');

$backofficeGroup->get('/products/update_products', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/products/update_products.html.twig');
})->bind('update_products');

$backofficeGroup->get('/products/delete_products', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/products/delete_products.html.twig');
})->bind('delete_products');



$backofficeGroup->get('/services/create_services', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/services/create_services.html.twig');
})->bind('create_services');

$backofficeGroup->get('/services/read_services', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/services/read_services.html.twig');
})->bind('read_services');

$backofficeGroup->get('/services/update_services', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/services/update_services.html.twig');
})->bind('update_services');

$backofficeGroup->get('/services/delete_services', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/services/delete_services.html.twig');
})->bind('delete_services');


$app->mount('/backoffice', $backofficeGroup);