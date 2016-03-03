<?php

namespace Ktp\Contracts;

interface HttpClient
{
    /**
     * Get base uri.
     *
     * @return string
     */
    public function baseUri();

    /**
     * Send HTTP POST request.
     *
     * @param string $uri
     * @param array  $data
     * @param array  $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, array $data = [], array $options = []);
}
