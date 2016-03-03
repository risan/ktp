<?php

use Ktp\HttpClient;
use Psr\Http\Message\ResponseInterface;

class HttpClientTest extends PHPUnit_Framework_TestCase {
    /** @test */
    function http_client_has_base_uri()
    {
        $httpClient = new HttpClient('http://foo.bar');

        $this->assertEquals('http://foo.bar', $httpClient->baseUri());
    }

    /** @test */
    function http_client_has_post_request()
    {
        $httpClient = new HttpClient('http://www.mocky.io/v2/');

        $response = $httpClient->post('5678638b0f00006a2a500861');

        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}
