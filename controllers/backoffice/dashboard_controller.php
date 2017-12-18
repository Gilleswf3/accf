<?php

use Symfony\Component\HttpFoundation\Request;

$backofficeGroup = $app['controllers_factory'];

//ROUTE DU DASHBOARD BACKOFFICE
$backofficeGroup->get('/dashboard', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/index.html.twig');
})->bind('dashboard');


//ROUTE DU DASHBOARD LOGIN
$backofficeGroup->match('/login', function(Request $request) use ($app) {
    $authorizedUsers = \Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('backoffice/login.html.twig', array(
                'authorizedUsers' => $authorizedUsers
    ));
})->bind('login');


//ROUTE DE LA PAGE EDITION AGENCE
$backofficeGroup->match('/editer_agence/{id}', function(Request $request, $id = null) use ($app) {

            if ($id) {
                $agency = Model\Propel\Base\AgenciesQuery::create()->findOneByIdAgency($id);
            } else {
                $agency = new Model\Propel\Agencies();
            }

            if ($request->request->all()) {
                $address = $request->request->get('_address');
                $zipcode = $request->request->get('_zipcode');
                $city = $request->request->get('_city');
                $area = $request->request->get('_area');

                // si tout va bien sauvegarde de l'entité
                $agency->setAddress($address);
                $agency->setZipcode($zipcode);
                $agency->setCity($city);
                $agency->setArea($area);

//            var_dump($agency);
//            die();

                $agency->save();
            }

            return $app['twig']->render('backoffice/dashboard/agencies/edit_agency.html.twig', ['agency' => $agency]);
        })
        ->value('id', null)
        ->bind('editer_agence');


//ROUTE DE LA PAGE AFFICHAGE AGENCE
$backofficeGroup->get('/afficher_agence', function() use ($app) {
    $agencies = \Model\Propel\AgenciesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/agencies/read_agency.html.twig', array(
                'agencies' => $agencies
    ));
})->bind('afficher_agence');

//ROUTE DE LA PAGE SUPPRESSION AGENCE
$backofficeGroup->match('/supprimer_agence/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\AgenciesQuery::create()->filterByIdAgency($id)->delete();
        return $app->redirect($app["url_generator"]->generate("afficher_agence"));
    })
    ->value('id', null)
    ->bind('supprimer_agence');
;

//ROUTE DE LA PAGE AFFICHAGE DETAILS CLIENT
$backofficeGroup->get('/afficher_client/{company}', function($company) use ($app) {
    $customer = \Model\Propel\CustomersQuery::create()
            ->findOneByCompany($company);
    return $app['twig']->render('backoffice/dashboard/customers/read_customer.html.twig', array(
        'customer' => $customer
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


//ROUTE DE LA PAGE EDITION EMPLOYE
$backofficeGroup->match('/employes/editer_employe/{id}', function(Request $request, $id = null) use ($app) {
            if ($id) {
                $employe = Model\Propel\Base\EmployeesQuery::create()->findOneByIdEmployee($id);
            } else {
                $employe = new Model\Propel\Employees();
            }
            if ($request->request->all()) {
                $firstName = $request->request->get('_firstname');
                $lastName = $request->request->get('_lastname');
                $email = $request->request->get('_email');
                $phone = $request->request->get('_phone');
                $job = $request->request->get('_job');
                $picture = $request->request->get('_picture');
                $role = $request->request->get('_role');
                $agency = $request->request->get('_agency');


                // si tout va bien sauvegarde de l'entité
                $employe->setFirstname($firstName);
                $employe->setLastname($lastName);
                $employe->setEmail($email);
                $employe->setPhone($phone);
                $employe->setJob($job);
                $employe->setPicture($picture);
                $employe->setRole($role);
                $employe->setIdAgency($agency);

                $employe->save();
            }
            return $app['twig']->render('backoffice/dashboard/employees/edit_employee.html.twig', ['employe' => $employe]);
        })
        ->value('id', null)
        ->bind('editer_employe');

//ROUTE DE LA PAGE AFFICHAGE EMPLOYE
$backofficeGroup->get('/employes/afficher_employe', function() use ($app) {
    $employees = \Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/employees/read_employee.html.twig', array(
                'employees' => $employees
    ));
})->bind('afficher_employe');

//ROUTE DE LA PAGE SUPPRESSION EMPLOYE
$backofficeGroup->get('/employees/supprimer_employe', function() use ($app) {
    $employees = \Model\Propel\EmployeesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/employees/delete_employee.html.twig', array(
                'employees' => $employees
    ));
})->bind('supprimer_employe');


//ROUTE DE LA PAGE EDITER PUBLICATION
$backofficeGroup->get('/standards/editer_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/edit_standard.html.twig');
})->bind('editer_publication');

//ROUTE DE LA PAGE SUPPRIMER PUBLICATION
$backofficeGroup->get('/standards/supprimer_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/delete_standard.html.twig');
})->bind('supprimer_publication');

//ROUTE DE LA PAGE AFFICHER PUBLICATION
$backofficeGroup->get('/standards/afficher_publication', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/standards/read_standard.html.twig');
})->bind('afficher_publication');




//ROUTE DE LA PAGE EDITION/MODIFICATION PRODUIT
$backofficeGroup->match('/products/editer_produits/{id}', function(Request $request,  $id = null) use ($app) {
    if($id) {
        $product = Model\Propel\Base\ProductsQuery::create()->findOneByIdProduct($id);
    } else {
        $product = new Model\Propel\Products();
    }
    if($request->request->all()) {
        $manufacturer = $request->request->get('_manufacturer');
        $productMainCategory = $request->request->get('_productmaincategory');
        $productSubCategory = $request->request->get('_productsubcategory');
        $title = $request->request->get('_title');
        $description = $request->request->get('_description');
        $picture = $request->request->get('_picture');        
        $priceVatExcluded = $request->request->get('_pricevatexcluded');
        $priceVatIncluded = $request->request->get('_pricevatincluded');

        
        // si tout va bien sauvegarde de l'entité
        $product->setManufacturer($manufacturer);
        $product->setProductMainCategory($productMainCategory);
        $product->setProductSubCategory($productSubCategory);
        $product->setTitle($title);
        $product->setDescription($description);
        $product->setPicture($picture);
        $product->setpriceVatExcluded($priceVatExcluded);
        $product->setpriceVatIncluded($priceVatIncluded);
        $product->save();
    }
    return $app['twig']->render('backoffice/dashboard/products/editer_products.html.twig', ['product' => $product]);
})
->value('id', null)
->bind('editer_produits');


// ROUTE DE LA PAGE AFFICHAGE DES PRODUITS
$backofficeGroup->get('/products/read_products', function() use ($app) {
    $product = \Model\Propel\ProductsQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/products/read_products.html.twig', array(
        'products' => $product
    ));
})->bind('read_products');


// ROUTE DE LA PAGE AFFICHAGE DU PRODUIT SELECTIONNE
$backofficeGroup->get('/products/read_selected_product/{id}', function($id) use ($app) {
    $product = \Model\Propel\ProductsQuery::create()->findOneByIdProduct($id);
    return $app['twig']->render('backoffice/dashboard/products/read_selected_product.html.twig', array(
        'product' => $product
    ));
})->bind('read_selected_product');


//ROUTE DE LA PAGE SUPPRESSION PRODUITS
$backofficeGroup->match('/read_products/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\ProductsQuery::create()->filterByIdProduct($id)->delete();
        return $app->redirect($app["url_generator"]->generate("read_products"));
    })
    ->value('id', null)
    ->bind('suppress_products');




//ROUTE DE LA PAGE EDITION/MODIFICATION SERVICES
$backofficeGroup->match('/services/editer_services/{id}', function(Request $request,  $id = null) use ($app) {
    if($id) {
        $service = Model\Propel\Base\ServicesQuery::create()->findOneByIdService($id);
    } else {
        $service = new Model\Propel\Services();
    }
    if($request->request->all()) {
        $title = $request->request->get('_title');
        $description = $request->request->get('_description');
        $priceVatExcluded = $request->request->get('_priceVatExcluded');
        $priceVatIncluded = $request->request->get('_priceVatIncluded');
               
        // si tout va bien sauvegarde de l'entité
        $service->setTitle($title);
        $service->setDescription($description);
        $service->setPriceVatExcluded($priceVatExcluded);
        $service->setPriceVatIncluded( $priceVatIncluded);
       
        $product->save();
    }
    return $app['twig']->render('backoffice/dashboard/services/editer_services.html.twig', ['service' => $service]);
})
->value('id', null)
->bind('editer_services');


// ROUTE DE LA PAGE AFFICHAGE DES SERVICES
$backofficeGroup->get('/services/read_services', function() use ($app) {
    $service = \Model\Propel\ServicesQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/services/read_services.html.twig', array(
        'services' => $service
    ));
})->bind('read_services');


//ROUTE DE LA PAGE SUPPRESSION SERVICES
$backofficeGroup->match('/read_services/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\ServicesQuery::create()->filterByIdService($id)->delete();
        return $app->redirect($app["url_generator"]->generate("read_services"));
    })
    ->value('id', null)
    ->bind('suppress_services');


$app->mount('/backoffice', $backofficeGroup);