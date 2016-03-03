<?php

namespace Ktp;

use Ktp\Parsers\NikResultPageParser;
use Ktp\Contracts\Finder as FinderContract;

class Finder implements FinderContract
{
    const BASE_URI = 'https://data.kpu.go.id/';
    const FIND_BY_NIK_URI = 'ss8.php';

    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new HttpClient(self::BASE_URI);
    }

    public function httpClient()
    {
        return $this->httpClient;
    }

    public function findByNik($nik)
    {
        $data = [
            'nik_global' => $nik,
            'cmd' => 'Cari.',
            'g-recaptcha-response' => 'foobar',
        ];

        $options = [
            'headers' => [
                'Referer' => 'https://data.kpu.go.id/ss8.php',
            ],
        ];

        $response = $this->httpClient()->post(self::FIND_BY_NIK_URI, $data, $options);

        return NikResultPageParser::fromResponse($response)->parse();
    }
}
