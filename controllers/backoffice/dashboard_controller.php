<?php

$backofficeGroup = $app['controllers_factory'];

$backofficeGroup->get('/dashboard', function() use ($app) {
    return $app['twig']->render('backoffice/dashboard/index.html.twig');
});

$app->mount('/backoffice', $backofficeGroup);