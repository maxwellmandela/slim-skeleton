<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\Record;
use Illuminate\Events\Dispatcher;

// vendor packages
require 'vendor/autoload.php';

// config
require "config.php";

// routes
$app->get('/', function (Request $request, Response $response, array $args) {
    $records = Record::all();
	$response = $this->view->render($response, 'index.phtml', ['employees' => $records]);
    return $response;
});

$app->get('/employees', function (Request $request, Response $response, array $args) {
    $records = Record::all();
    return $records->toJson();

	//$response = $this->view->render($response, 'index.phtml', ['name' => $name]);
    //return $response;
});

$app->get('/employees/{id}', function (Request $request, Response $response, array $args) {
    $record = Record::find($args['id']);
	if($record){
	    return $record->toJson();
	}

	return "No Record found";

	//$response = $this->view->render($response, 'index.phtml', ['name' => $name]);
    //return $response;
});

$app->post('/register', function (Request $request, Response $response, array $args) {
    $record = new Record;
	$record->name = $args['name'];
	$record->email = 'john@email.com';
	$record->reporting_date = '2018-02-12';
	$record->age = 23;
	$record->department = 'IT';
	//$record->save();
    //echo $record->toJson();

	//$response = $this->view->render($response, 'index.phtml', ['name' => $name]);
    //return $response;
});

$app->run();
