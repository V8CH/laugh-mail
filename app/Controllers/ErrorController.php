<?php

namespace V8CH\LaughMail\Controllers;

use V8CH\LaughMail\Request;

class ErrorController extends Controller
{

    /**
     * Returns error view based on status
     */
    public function handle($status)
    {
        http_response_code(intval($status));
        return $this->view($status);
    }
}
