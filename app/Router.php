<?php

namespace V8CH\LaughMail;

use \BadMethodCallException;

class Router
{

    /**
     * Allowed HTTP verbs (methods)
     *
     * @var array
     */
    protected $supportedHttpVerbs = array("GET");

    /**
     * Current Request
     *
     * @var \V8CH\LaughMail\Request
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Magic method to build our routes
     *
     * @param string $httpVerb String name of the route verb to build
     * @param array $args Array of string arguments to the called method, including
     *              the route and a mapping for controller class and method
     */
    public function __call($httpVerb, $args)
    {
        list($route, $controllerClass, $method) = $args;

        // Verify function is for a supported HTTP verb (method)
        if (!in_array(strtoupper($httpVerb), $this->supportedHttpVerbs)) {
            $unsupported = strtoupper($httpVerb);
            throw new BadMethodCallException("Unsupported HTTP Method: {$unsupported}");
        }

        // Map the route config as an array into an instance property by HTTP verb (method); key
        // is the route (uri) and the config is a string array with controller class name and method
        $this->{$httpVerb}[$route] = [$controllerClass, $method];
    }
    
    /**
     * Where all the magic happens: Looks up the requested route and calls
     * the correct controller method or sends a not-found response
     *
     * @var \V8CH\LaughMail\Request
     */
    public function resolve()
    {
        // Get all routes mapped to our current HTTP verb (method)
        $methods = property_exists($this, strtolower($this->request->verb)) ? $this->{strtolower($this->request->verb)} : null;

        if (empty($methods) || !array_key_exists($this->request->uri, $methods)) {
            return $this->handleNotFound();
        }

        // Lookup the current request URI in all route configs for current HTTP verb (method)
        $routeConfig = $methods[$this->request->uri];

        // Extract required controller classname and method then call it
        list($controllerClass, $method) = $routeConfig;
        $controller = new $controllerClass;
        $controller->$method($this->request);
    }
    
    /**
     * Sends a not-found response
     *
     * @var \V8CH\LaughMail\Request
     */
    protected function handleNotFound()
    {
        http_response_code(404);
        include dirname(__FILE__) . "/../resources/views/404.php";
        exit(0);
    }
}
