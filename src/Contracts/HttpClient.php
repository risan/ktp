<?php

namespace Ktp\Contracts;

interface HttpClient
{
    public function baseUri();
    public function post($uri, array $data = [], array $options = []);
}
