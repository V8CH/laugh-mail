<?php

namespace V8CH\LaughMail\Controllers;

class Controller
{
    
    /**
     * Sends JSON response
     *
     * @param array $data Array of data to serialize to JSON
     */
    protected function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit(0);
    }

    /**
     * Sends view response
     *
     * @param string $file String filename key for view file
     * @param array $assigns Array of data to make available to the view file
     */
    protected function view($file, $assigns = [])
    {
        header("Content-Type: text/html; charset=utf-8");
        include dirname(__FILE__) . "/../../resources/views/{$file}.php";
        exit(0);
    }
}
