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

// View page.
$app->get('/[{page}]', function ($request, $response, $args) {
    $num = ( isset($args['page']) ) ? (string) $args['page'] : '';
    // Display 5 at a time. pagination that provides offset for db query.
    $response->getBody()->write('This is a treadmill thought.'. $num);

    return $response;
});

$app->run();
