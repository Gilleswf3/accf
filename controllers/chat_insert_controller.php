<?php

use Model\Propel\Base\Hotline;
use Symfony\Component\HttpFoundation\Request;






$publicGroup ->match('insertMessage', function(Request $request) use ($app) {
    
    
  if(($app['security.authorization_checker']->isGranted('ROLE_CLIENT'))){
      $employee = \Model\Propel\Base\EmployeesQuery::create()->findOneByIdEmployee(1);
      $message = new \Model\Propel\Hotline();
      $message->setCustomers($app['user']);
      $message->setEmployees($employee);
      $message->setHotlineMessage($request->request->get('hotline_message'));
      $message->setTypeAuthor('CUSTOMER');
      $message->save();
 
                
  }
  return $app['twig']->render('frontoffice/layout.html.twig');
})
->bind('insertMessage')
->method('GET|POST');

