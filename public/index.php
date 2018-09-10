<?php

use V8CH\LaughMail\Request;
use V8CH\LaughMail\Router;

require_once dirname(__FILE__) . '/../vendor/autoload.php';

// Basic bootstrapping: Create Request object and pass it to our Router
$request = new Request();
$router = new Router($request);

// Define routes
$router->get('/', '\V8CH\LaughMail\Controllers\HomeController', 'index');
$router->get('/api/jokes', '\V8CH\LaughMail\Controllers\JokesController', 'index');

// Send response
$router->resolve();
