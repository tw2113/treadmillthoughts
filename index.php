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

// View page.
$app->get('/add/', function ($request, $response) {
    /*
     * Single textarea and submit button.
     */
});

// Return JSON data version of thoughts.
$app->get('/json/', function ($request, $response) {
    $uri_stuff = $request->getQueryParams();
    /*
     * Count: default 1. Possible: any number.
     * Orderby: default date. Possible: date, random/
     * Order: default: DESC. Possible: ASC, DESC
     */

    /**
     * Query based on reuqest, return json.
     * Date, thought.
     */
    $data = [];
    $newResponse = $response->withJson($data);

    return $newResponse;
});

// Random thought.
$app->get('/json/random/', function ($request, $response) {
    $data        = [ 'time' => 'back in', 'thought' => 'let\'s go row' ];
    $newResponse = $response->withJson($data);

    return $newResponse;
});

$app->run();
