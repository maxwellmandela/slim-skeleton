<?php

require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/', function ($request, $response, $args) {
    return $response->write("Hello world");
});

$app->get('/user/home', function ($request, $response, $args) {
    return $response->write("Hello world, this is our site, welcome home to your profile");
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello, " . $args['name']);
});

$app->run();
