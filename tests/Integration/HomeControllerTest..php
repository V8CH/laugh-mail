<?php

namespace V8CH\LaughMail\Test\Feature;

use GuzzleHttp\Client as HttpClient;
use PHPUnit\Framework\TestCase as BaseTestCase;

class HomeControllerTest extends BaseTestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new HttpClient(["base_uri" => "http://laugh-mail.local/"]);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    /**
     * Test returns home view by default
     *
     * @test
     */
    public function returnsHomeView()
    {
        $response = $this->http->request('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains("Laugh Mail", (string) $response->getBody());
    }
}
