<?php

namespace V8CH\LaughMail\Controllers;

use V8CH\LaughMail\Models\Joke;

class HomeController extends Controller
{

    /**
     * Responds with default home view
     *
     */
    public function index()
    {
        return $this->view("home", ["joke" => Joke::random()]);
    }
}
