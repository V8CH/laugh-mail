<?php

namespace V8CH\LaughMail;

class Request
{

    /**
     * Associative array of query params
     *
     * @var array
     */
    public $query = [];

    /**
     * Current request URI
     *
     * @var string
     */
    public $uri;

    /**
     * Current request verb (method)
     *
     * @var string
     */
    public $verb;

    public function __construct()
    {
        $this->verb = $_SERVER['REQUEST_METHOD'];
        $this->uri = $this->formatUri($_SERVER['REQUEST_URI']);
        parse_str($_SERVER["QUERY_STRING"], $this->query);
    }

    private function formatUri($requestUri)
    {
        $uri = preg_replace("/\?.+$/", "", $requestUri);
        return $uri === "/" ? $uri : rtrim($uri, "/");
    }
}
