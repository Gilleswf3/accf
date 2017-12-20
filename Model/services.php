<?php

use Model\Propel\Base\EmployeesQuery;
use Model\Propel\CustomersQuery;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;

$app->register(new TwigServiceProvider(), [
    'twig.path' => 'views'
]);

$app->register(new AssetServiceProvider(), [
    'assets.base_path' => 'assets'
]);

$app->extend('twig', function($twig){
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    
    return $twig;
});

$app->register(new SessionServiceProvider());

$app->register(new SecurityServiceProvider(), array(
    'security.firewalls' => [
        'admin' => array(
            'pattern' => '^/backoffice/',
            'form' => array(
                'login_path' => '/login', 
                'check_path' => '/backoffice/login_check',
                'always_use_default_target_path' => true,
                'default_target_path' => '/backoffice/dashboard'
            ),
//            'http' => true,
            'anonymous' => false,
            'logout' => array('logout_path' => '/backoffice/logout', 'invalidate_session' => true),
            'users' => function () {
                return EmployeesQuery::create();
            },
           

        ),
        'front' => array(
            'pattern' => '^/frontoffice/',
            
            'form' => array(
                'login_path' => '/profile', 
                'check_path' => '/frontoffice/profile_check',
                'always_use_default_target_path' => true,
                'default_target_path' => '/frontoffice/accueil'
            ),
            'anonymous' => true,
            'logout' => array('logout_path' => '/frontoffice/logout', 'invalidate_session' => true),
            'users' => function () use ($app) {
                return CustomersQuery::create();
            }
        ),
    ]
));
            
$app['security.default_encoder'] = function ($app) {
    return new PlaintextPasswordEncoder();
};