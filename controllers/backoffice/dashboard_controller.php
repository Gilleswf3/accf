<?php

use Symfony\Component\HttpFoundation\Request;

$backofficeGroup = $app['controllers_factory'];

//ROUTE DU DASHBOARD BACKOFFICE
//$backofficeGroup->get('/dashboard', function() use ($app) {
//    return $app['twig']->render('backoffice/dashboard/index.html.twig');
//})->bind('dashboard');


$backofficeGroup->get('/dashboard', function() use ($app) {
    $agencies = \Model\Propel\AgenciesQuery::create()->find();
    $contents = \Model\Propel\ContentsQuery::create()
            ->limit(2)            
            ->find();
    $employees = \Model\Propel\EmployeesQuery::create()
            ->limit(2)
            ->find();
    $products = \Model\Propel\ProductsQuery::create()
            ->limit(2)
            ->find();
    $services = \Model\Propel\ServicesQuery::create()
            ->limit(2)
            ->find();

    //CUSTOMER STATS
    $dailyCustomersCount = Model\Propel\CustomersQuery::create()
        ->filterByRegistrationDate(array('min' => time() - 1 * 24 * 60 * 60))
        ->count();
    $weeklyCustomersCount = Model\Propel\CustomersQuery::create()
        ->filterByRegistrationDate(array('min' => time() - 7 * 24 * 60 * 60))
        ->count();
    $monthlyCustomersCount = Model\Propel\CustomersQuery::create()
        ->filterByRegistrationDate(array('min' => time() - 30 * 24 * 60 * 60))
        ->count();

    
    
    //ORDER STATS
    $lastDayOrders = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 1 * 24 * 60 * 60)))
        ->count();

    $lastWeekOrders = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 7 * 24 * 60 * 60)))
        ->count();

    $lastMonthOrders = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 30 * 24 * 60 * 60)))
        ->count();

    
    //COMMANDES MINIMALES
    
    $lastDayMinimalOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 1 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('MIN(Products.PriceVatExcluded)', 'productMinimalPrice')
        ->withColumn('MIN(Services.PriceVatExcluded)', 'serviceMinimalPrice')
        ->findOne();

    $lastWeekMinimalOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 7 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('MIN(Products.PriceVatExcluded)', 'productMinimalPrice')
        ->withColumn('MIN(Services.PriceVatExcluded)', 'serviceMinimalPrice')
        ->findOne();

    $lastMonthMinimalOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 30 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('MIN(Products.PriceVatExcluded)', 'productMinimalPrice')
        ->withColumn('MIN(Services.PriceVatExcluded)', 'serviceMinimalPrice')
        ->findOne();

    
    //COMMANDES MOYENNES
        
    $lastDayAverageOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 1 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('AVG(Products.PriceVatExcluded)', 'productAveragePrice')
        ->withColumn('AVG(Services.PriceVatExcluded)', 'serviceAveragePrice')
        ->findOne();

    $lastWeekAverageOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 7 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('AVG(Products.PriceVatExcluded)', 'productAveragePrice')
        ->withColumn('AVG(Services.PriceVatExcluded)', 'serviceAveragePrice')
        ->findOne();

    $lastMonthAverageOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 30 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('AVG(Products.PriceVatExcluded)', 'productAveragePrice')
        ->withColumn('AVG(Services.PriceVatExcluded)', 'serviceAveragePrice')
        ->findOne();

    
    //COMMANDES MAXIMALES

    $lastDayMaximalOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 1 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('MAX(Products.PriceVatExcluded)', 'productMaximalPrice')
        ->withColumn('MAX(Services.PriceVatExcluded)', 'serviceMaximalPrice')
        ->findOne();

    $lastWeekMaximalOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 7 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('MAX(Products.PriceVatExcluded)', 'productMaximalPrice')
        ->withColumn('MAX(Services.PriceVatExcluded)', 'serviceMaximalPrice')
        ->findOne();
    
    $lastMonthMaximalOrder = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 30 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('MAX(Products.PriceVatExcluded)', 'productMaximalPrice')
        ->withColumn('MAX(Services.PriceVatExcluded)', 'serviceMaximalPrice')
        ->findOne();

    
    //SOMME COMMANDES

    $lastDayOrderSum = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 1 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('SUM(Products.PriceVatExcluded)', 'productSum')
        ->withColumn('SUM(Services.PriceVatExcluded)', 'serviceSum')
        ->findOne();

    $lastWeekOrderSum = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 7 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('SUM(Products.PriceVatExcluded)', 'productSum')
        ->withColumn('SUM(Services.PriceVatExcluded)', 'serviceSum')
        ->findOne();

    $lastMonthOrderSum = Model\Propel\OrdersQuery::create()
        ->filterByOrderDate(array('min' => date('Y-m-d h:i:s', time() - 30 * 24 * 60 * 60)))
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('SUM(Products.PriceVatExcluded)', 'productSum')
        ->withColumn('SUM(Services.PriceVatExcluded)', 'serviceSum')
        ->findOne();
    
    
//    var_dump($lastDayMinimalOrder);
    
    return $app['twig']->render('backoffice/dashboard/index.html.twig', array(
        'agencies' => $agencies,
        'contents' => $contents,
        'employees' => $employees,
        'products' => $products,
        'services' => $services,
        
        'dailyCustomersCount' => $dailyCustomersCount,
        'weeklyCustomersCount' => $weeklyCustomersCount,
        'monthlyCustomersCount' => $monthlyCustomersCount,
            
        'lastDayOrders' => $lastDayOrders,
        'lastWeekOrders' => $lastWeekOrders,
        'lastMonthOrders' => $lastMonthOrders,
            
        'lastDayMinimalOrder' => $lastDayMinimalOrder,
        'lastWeekMinimalOrder' => $lastWeekMinimalOrder,
        'lastMonthMinimalOrder' => $lastMonthMinimalOrder,
            
        'lastDayAverageOrder' => $lastDayAverageOrder,
        'lastWeekAverageOrder' => $lastWeekAverageOrder,
        'lastMonthAverageOrder' => $lastMonthAverageOrder,

        'lastDayMaximalOrder' => $lastDayMaximalOrder,
        'lastWeekMaximalOrder' => $lastWeekMaximalOrder,
        'lastMonthMaximalOrder' => $lastMonthMaximalOrder,
        
        'lastDayOrderSum' => $lastDayOrderSum,
        'lastWeekOrderSum' => $lastWeekOrderSum,
        'lastMonthOrderSum' => $lastMonthOrderSum

            
    ));
})->bind('dashboard');




//ROUTE DU DASHBOARD LOGIN

$backofficeGroup->match('/login', function(Request $request) use ($app) {

    $email = $request->request->get('_email');
    $role = $request->request->get('_role');
    
//    var_dump($email);
//    var_dump($role);

    $employe1 = Model\Propel\Base\EmployeesQuery::create()->findOneByEmail($email);
    $employe2 = Model\Propel\Base\EmployeesQuery::create()->findOneByRole($role);
    
//    var_dump($employe);

    if(!empty($employe1) && !empty($employe2)) {
//        var_dump($employe);
        return $app->redirect($app["url_generator"]->generate("dashboard"));
    }
    else{
        return $app['twig']->render('backoffice/login.html.twig');
    }
    
})->bind('login');

////$backofficeGroup->match('/login', function(Request $request) use ($app) {
//    $authorizedUsers = \Model\Propel\EmployeesQuery::create()->find();
//    return $app['twig']->render('backoffice/login.html.twig', array(
//                'authorizedUsers' => $authorizedUsers
//    ));
//})->bind('login');


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

//ROUTE DE LA PAGE SUPPRESSION CLIENT
$backofficeGroup->match('/supprimer_client/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\CustomersQuery::create()->filterByIdCustomer($id)->delete();
        return $app->redirect($app["url_generator"]->generate("afficher_clients"));
    })
    ->value('id', null)
    ->bind('supprimer_client');

//ROUTE DE LA PAGE AFFICHAGE DETAILS COMMANDE
$backofficeGroup->get('/afficher_commande/{idOrder}', function($idOrder) use ($app) {
    $order = \Model\Propel\OrdersQuery::create()
        ->joinWithCustomers()
        ->joinOrderdetails()
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('(Customers.Company)', 'customerName')
        ->withColumn('(Customers.Email)', 'customerEmail')
        ->withColumn('(Orderdetails.ProductQuantity)', 'orderProductQuantity')
        ->withColumn('(Orderdetails.ServiceQuantity)', 'orderServiceQuantity')
        ->withColumn('(Products.ProductMainCategory)', 'productCategory')
        ->withColumn('(Products.PriceVatExcluded)', 'productAmount')
        ->withColumn('(Services.Title)', 'serviceTitle')
        ->withColumn('(Services.PriceVatExcluded)', 'serviceAmount')
        ->findOneByIdOrder($idOrder);
    return $app['twig']->render('backoffice/dashboard/orders/read_order.html.twig', array(
        'order' => $order
    ));
})->bind('afficher_commande');

//ROUTE DE LA PAGE AFFICHAGE COMMANDES
$backofficeGroup->get('/afficher_commandes', function() use ($app) {
    $orders = \Model\Propel\OrdersQuery::create()
        ->joinWithCustomers()
        ->joinWithProducts()
        ->joinWithServices()
        ->withColumn('(Customers.Company)', 'customerName')
        ->withColumn('(Products.PriceVatExcluded)', 'productAmount')
        ->withColumn('(Services.PriceVatExcluded)', 'serviceAmount')
        ->limit(10)
        ->orderByIdOrder('desc')
        ->find();

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
                $password = $request->request->get('_password');
                $picture = $request->request->get('_picture');
                $role = $request->request->get('_role');
                $agency = $request->request->get('_agency');

                // si tout va bien sauvegarde de l'entité
                $employe->setFirstname($firstName);
                $employe->setLastname($lastName);
                $employe->setEmail($email);
                $employe->setPhone($phone);
                $employe->setJob($job);
                $employe->setPassword($password);
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
$backofficeGroup->match('/supprimer_employe/{id}', function($id = null) use ($app) {
    $result = \Model\Propel\EmployeesQuery::create()->filterByIdEmployee($id)->delete();
        return $app->redirect($app["url_generator"]->generate("afficher_employe"));
})
->value('id',null)
->bind('supprimer_employe');


//ROUTE DE LA PAGE EDITION/MODIFICATION PUBLICATIONS
$backofficeGroup->match('/editer_contents/{id}', function(Request $request,  $id = null) use ($app) {
    if($id) {
        $content = Model\Propel\Base\ContentsQuery::create()->findOneByIdContent($id);
    } else {
        $content = new Model\Propel\Contents();
    }
    if($request->request->all()) {
        $picture = $request->request->get('_picture');
        $title = $request->request->get('_title');
        $text = $request->request->get('_text');
        $subtitle = $request->request->get('_subtitle');
       

        
        // si tout va bien sauvegarde de l'entité
        $content->setPicture($picture);
        $content->setTitle($title);
        $content->setText($text);
        $content->setSubtitle($subtitle);
       
        $content->save();
    }
    return $app['twig']->render('backoffice/dashboard/contents/editer_contents.html.twig', ['content' => $content]);
})
->value('id', null)
->bind('editer_publication');


// ROUTE DE LA PAGE AFFICHAGE DES PUBLICATIONS
$backofficeGroup->get('/contents/read_publication', function() use ($app) {
    $content = \Model\Propel\ContentsQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/contents/read_contents.html.twig', array(
        'contents' => $content
    ));
})->bind('afficher_publication');




//ROUTE DE LA PAGE SUPPRESSION PUBLICATIONS
$backofficeGroup->match('/read_publication/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\ContentQuery::create()->filterByIdContent($id)->delete();
        return $app->redirect($app["url_generator"]->generate("read_publication"));
    })
    ->value('id', null)
    ->bind('supprimer_publication');


//ROUTE DE LA PAGE EDITION/MODIFICATION PRODUIT
$backofficeGroup->match('/editer_produits/{id}', function(Request $request,  $id = null) use ($app) {
    if($id) {
        $product = Model\Propel\Base\ProductsQuery::create()->findOneByIdProduct($id);
    } else {
        $product = new Model\Propel\Products();
    }
    if($request->request->all()) {
        $manufacturer = $request->request->get('_manufacturer');
        $productMainCategory = $request->request->get('_productMainCategory');
        $productSubCategory = $request->request->get('_productSubCategory');
        $title = $request->request->get('_title');
        $description = $request->request->get('_description');
        $picture = $request->request->get('_picture');        
        $priceVatExcluded = $request->request->get('_priceVatExcluded');
        $priceVatIncluded = $request->request->get('_priceVatIncluded');

        
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
    $products = \Model\Propel\ProductsQuery::create()->find();
    return $app['twig']->render('backoffice/dashboard/products/read_products.html.twig', array(
        'products' => $products
    ));
})->bind('afficher_produits');


// ROUTE DE LA PAGE AFFICHAGE DU PRODUIT SELECTIONNE
$backofficeGroup->get('/products/read_selected_product/{id}', function($id) use ($app) {
    $product = \Model\Propel\ProductsQuery::create()->findOneByIdProduct($id);
    return $app['twig']->render('backoffice/dashboard/products/read_selected_product.html.twig', array(
        'product' => $product
    ));
})->bind('read_selected_product');


//ROUTE DE LA PAGE SUPPRESSION AGENCE
$backofficeGroup->match('/supprimer_agence/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\AgenciesQuery::create()->filterByIdAgency($id)->delete();
        return $app->redirect($app["url_generator"]->generate("afficher_agence"));
    })
    ->value('id', null)
    ->bind('supprimer_agence');


//ROUTE DE LA PAGE SUPPRESSION PRODUITS
$backofficeGroup->match('/supprimer_produits/{id}', function($id = null) use ($app) {
        $result = \Model\Propel\ProductsQuery::create()->filterByIdProduct($id)->delete();
        return $app->redirect($app["url_generator"]->generate("afficher_produits"));
    })
    ->value('id', null)
    ->bind('supprimer_produits');

    
//ROUTE DU FILTRE DES PRODUITS
    $backofficeGroup->get('/filtre_produits', function() use ($app) {
        $filtres = \Model\Propel\ProductsQuery::create()->find();

        $desenfumages = Model\Propel\ProductsQuery::create()
            ->filterByProductSubCategory('Desenfumage')
            ->find();
    
        $detectionChutes = Model\Propel\ProductsQuery::create()
             ->filterByProductSubCategory('Detection des chutes')
             ->find();
        
        $alarmes = Model\Propel\ProductsQuery::create()
             ->filterByProductSubCategory('Alarmes')
             ->find();
        
        $appelMalades = Model\Propel\ProductsQuery::create()
             ->filterByProductSubCategory('Appel Malade')
             ->find();
        
        $controleAcces = Model\Propel\ProductsQuery::create()
             ->filterByProductSubCategory('Controle d\'acces')
             ->find();
             
         $videoSurveillances  = Model\Propel\ProductsQuery::create()
              ->filterByProductSubCategory('Video-surveillance')
              ->find();
         
         $detectionIncendies  = Model\Propel\ProductsQuery::create()
              ->filterByProductSubCategory('Detection incendie')
               ->find();
                 
          $eclairageSecurites  = Model\Propel\ProductsQuery::create()
              ->filterByProductSubCategory('Eclairage de securite')
                  ->find();
                                       
    return $app['twig']->render('backoffice/dashboard/products/filtre_produits.html.twig', array(
        'filtres' => $filtres,
        'desenfumages' => $desenfumages,
        'detectionChutes' => $detectionChutes,
        'alarmes' => $alarmes,
        'appelMalades' => $appelMalades,     
        'controleAcces' => $controleAcces,
        'videoSurveillances' => $videoSurveillances,
        'detectionIncendies' => $detectionIncendies,
        'eclairageSecurites' => $eclairageSecurites
));
})      ->bind('filtre_produits');


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
       
        $service->save();
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