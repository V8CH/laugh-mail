<?php

use V8CH\LaughMail\Request;
use V8CH\LaughMail\Router;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

// Define routes
$router = new Router();
$router->get('/', '\V8CH\LaughMail\Controllers\HomeController', 'index');
$router->get('/api/jokes', '\V8CH\LaughMail\Controllers\JokesController', 'index');

// Send response
$request = new Request();
$router->resolve($request);
