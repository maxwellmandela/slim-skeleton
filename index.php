<?php

require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/', function ($request, $response, $args) {
    return $response->write("Hello world, welcome to slim by Max ;)");
});

$app->get('/user/home', function ($request, $response, $args) {
    return $response->write("Hello world, this is our site, welcome home to your profile");
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello, " . $args['name']);
});

$app->post('/post', function($request, $responce, $args){
    return $responce->write("Posted");
});

$app->run();
