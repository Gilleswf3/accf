<?php

use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;

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
