<?php
use Model\Propel\Base\Hotline;
use Symfony\Component\HttpFoundation\Request;
 

$publicGroup ->match('/messages', function(Request $request) use ($app) {
    
    
  if(($app['security.authorization_checker']->isGranted('ROLE_CLIENT'))){
      
      $messages = Model\Propel\HotlineQuery::create()->filterByCustomers($app['user'])
             
              ->find();
       return $app->json($messages->toArray());     
                
  }
  
  return $app->abort(404, "Page does not exist.");
 
  
})
->method('GET')
->bind('get_messages');




