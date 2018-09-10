<?php

namespace V8CH\LaughMail\Controllers;

use V8CH\LaughMail\Models\Joke;
use V8CH\LaughMail\Request;

class JokesController extends Controller
{

    /**
     * Responds with list of jokes serialized to JSON
     *
     * @param Request $request Current request object
     */
    public function index(Request $request)
    {
        if (array_key_exists("count", $request->query)) {
            $count = intval($request->query["count"]);
            $jokes = new Joke();
            return $this->json($jokes->limit($count)->get());
        }
        return $this->json(Joke::all());
    }
}
