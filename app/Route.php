<?php

namespace V8CH\LaughMail;

class Route
{

    /**
     * Controller class name
     *
     * @var string
     */
    public $controllerClass;

    /**
     * Controller method key
     *
     * @var string
     */
    public $method;

    /**
     * Full URI
     *
     * @var string
     */
    public $uri;

    /**
     * HTTP method (verb)
     *
     * @var string
     */
    public $verb;

    public function __construct($verb, $uri, $controllerClass, $method)
    {
        $this->controllerClass = $controllerClass;
        $this->method = $method;
        $this->uri = $uri;
        $this->verb = $verb;
    }
}
