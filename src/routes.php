<?php

use Petrik\Telefonok\Telefon;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

return function (Slim\App  $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('<div style="margin: auto;">Welcome traveler, have a great stay.</div>');
        return $response;
    });

    $app->get('/telefonok', function (Request $request, Response $response) {
        $mobiles = Telefon::all();
        $output = $mobiles->toJson();
        $response->getBody()->write($output);
        return $response
        ->withHeader('Content-Type', 'application/json');
    });

    $app->get('/telefonok/{id}', function (Request $request, Response $response, array $args) {
        if (!is_numeric($args['id']) || $args['id'] < 0) {
            $ki = json_encode(['error' => 'Az ID pozitív egész szám kell hogy legyen!']);
            $response->getBody()->write($ki);
            return $response
              ->withHeader('Content-Type', 'application/json')
              ->withStatus(400);
          }
          $mobil = Telefon::find($args['id']);

          
    });
};