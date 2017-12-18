<?php

use Symfony\Component\HttpFoundation\Request;

$publicGroup = $app['controllers_factory'];

$publicGroup->match('/contact', function(Request $request) use ($app) {


    $customer = \Model\Propel\CustomersQuery::create();
            $customer->set('_lastname', $lastname);
           $customer->set('_firstname', $firstname);
            $customer->set('_email', $email);
            $customer->set('_password', $password);
            $customer->save();

            
            if (!empty($customer)) {
                $app['customer'] = $customer;
                return $app->redirect($app['url_generator']->generate('accueil'));
            }


            return $app['twig']->render('frontoffice/front_public/customers.html.twig');
        })
        ->method('GET|POST')
        ->bind('contact');

$app->mount('/frontoffice', $publicGroup);





