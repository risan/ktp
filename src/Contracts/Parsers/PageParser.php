<?php

namespace Ktp\Contracts\Parsers;

use Psr\Http\Message\ResponseInterface;

interface PageParser
{
    public function page();
    public function crawler();
    public function parse();
    public static function fromResponse(ResponseInterface $response);
}
