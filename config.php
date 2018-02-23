<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db'] = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'awesome_api',
    'username' => 'root',
    'password' => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$app = new Slim\App([
	'settings' => $config
]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer('views/');
$settings = $config['db'];

// Bootstrap Eloquent ORM
$container['db'] = function (ContainerInterface $container) {
    $settings = $container->get('database');
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($config['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$capsule = new Capsule;
$capsule->addConnection($config['db']);
$capsule->bootEloquent();
