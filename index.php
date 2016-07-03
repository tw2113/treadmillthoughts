<?php

namespace tw2113\treadmill;

use \Slim as Slim;
use \League\Plates\Engine as Plates;
use \AdamWathan\Form\FormBuilder as FormBuilder;

require 'vendor/autoload.php';

$app = new Slim\App(
    [
        'debug'       => true,
        'log.enabled' => true,
    ]
);

// Add so we do not need to instantiate everywhere.
$app->plates = new Plates('./templates');
/*
 * $app->config = require 'config/config.php';
 */

$app->get('/', function ($request, $response) {
    $response->getBody()->write('This is a treadmill thought.');

    return $response;
});

$app->run();
