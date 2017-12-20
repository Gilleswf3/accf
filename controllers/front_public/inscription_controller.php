<?php

use Model\Propel\Base\Customers;
use Symfony\Component\HttpFoundation\Request;


$publicGroup->match('/inscription', function(Request $request) use ($app) {

            if ($request->request->all()) {
                $lastname = $request->request->get('_lastname');
                $firstname = $request->request->get('_firstname');
                $email = $request->request->get('_email');
                $phone = $request->request->get('_phone');
                $password = $request->request->get('_password');
                $job = $request->request->get('_job');
                $company = $request->request->get('_company');
                $billtoAdress = $request->request->get('_billtoAdress');
                $billtoZipcode = $request->request->get('_billtoZipcode');
                $billtoCity = $request->request->get('_billtoCity');
                $shiptoAdress = $request->request->get('_shiptoAdress');
                $shiptoZipcode = $request->request->get('_shiptoZipcode');
                $shiptoCity = $request->request->get('_shiptoCity');

                $inscription = new \Model\Propel\Customers();

                $inscription->setLastname($lastname);
                $inscription->setFirstname($firstname);
                $inscription->setEmail($email);
                $inscription->setPhone($phone);
                $inscription->setPassword($password);
                $inscription->setJob($job);
                $inscription->setCompany($company);
                $inscription->setBilltoAddress($billtoAdress);
                $inscription->setBilltoZipcode($billtoZipcode);
                $inscription->setBilltoCity($billtoCity);
                $inscription->setShiptoAddress($shiptoAdress);
                $inscription->setShiptoZipcode($shiptoZipcode);
                $inscription->setShiptoCity($shiptoCity);
                $inscription->save();
                
            }
            
            if (!empty($inscription)) {
                $app['inscription'] = $inscription;
                return $app->redirect($app['url_generator']->generate('profile'));
                
                
            }
            
            return $app['twig']->render('frontoffice/front_public/inscription.html.twig');
        })
        ->method('GET|POST')
        ->bind('inscription');





