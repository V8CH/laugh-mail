<?php

namespace V8CH\LaughMail;

use \V8CH\LaughMail\Controllers\ErrorController;

class Router
{

    /**
     * Configured routes
     *
     * @var array
     */
    protected $routes = [];

    /**
     * Build our routes
     *
     * @param string $httpVerb String name of the route verb to build
     * @param array $args Array of string arguments to the called method, including
     *              the route and a mapping for controller class and method
     */
    public function __call($httpVerb, $args)
    {
        list($uri, $controllerClass, $method) = $args;
        $httpVerb = strtoupper($httpVerb);

        // Add to routes array
        $this->add($httpVerb, $uri, $controllerClass, $method);
    }
    
    /**
     * Where all the magic happens: Looks up the requested route and calls
     * the correct controller method or sends a not-found response
     *
     * @var \V8CH\LaughMail\Request
     */
    public function resolve(Request $request)
    {
        // Get all routes mapped to our current HTTP method (verb)
        $routesForVerb = $this->routes[$request->verb];

        // Verify requsted URI
        if (!isset($routesForVerb[$request->uri])) {
            $controller = new ErrorController();
            $controller->handle("404");
        }

        // Lookup the current request URI in all route configs for current HTTP method (verb)
        $route = $routesForVerb[$request->uri];

        // Create controller and call required method
        $controller = new $route->controllerClass;
        $controller->{$route->method}($request);
        exit(0);
    }

    protected function add($verb, $uri, $controllerClass, $method)
    {
        $route = new Route($verb, $uri, $controllerClass, $method);
        $this->routes[$route->verb][$route->uri] = $route;
    }
}
