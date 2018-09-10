<?php

namespace V8CH\LaughMail\Models;

class Joke
{

    /**
     * Limit for joke objects query
     *
     * @var integer $request Current request object
     */
    private $limit = 0;

    /**
     * Returns all joke objects
     *
     */
    public static function all()
    {
        return Joke::getDataSource();
    }

    /**
     * Returns a single random joke
     *
     * @return Object Joke object (parsed from JSON)
     */
    public static function random()
    {
        $data = Joke::getDataSource();
        $index = array_rand($data);
        return $data[$index];
    }

    /**
     * Returns an array of joke objects, optionally with previously chained limit
     *
     * @return array Array of joke objects (parsed from JSON)
     */
    public function get()
    {
        if ($this->limit > 0 && $this->limit <= 75) {
            return $this->getWithLimit();
        }
        return Joke::all();
    }

    /**
     * Can be chained on to a query to limit the number of returned joke objects
     *
     * @param integer $count Integer limit for the number of joke objects to return
     */
    public function limit($count)
    {
        $this->limit = $count;
        return $this;
    }

    /**
     * Reads and parses joke objects from a JSON file
     *
     */
    private static function getDataSource()
    {
        return json_decode(file_get_contents(dirname(__FILE__) . "/../../resources/data/jokes.json"));
    }

    /**
     * Returns an array of joke objects as limited
     *
     */
    private function getWithLimit()
    {
        $data =Joke::getDataSource();
        
        $indexes = array_rand($data, $this->limit);
        return array_map(function ($index) use ($data) {
            return $data[$index];
        }, $indexes);
    }
}
