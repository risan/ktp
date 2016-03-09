<?php

namespace Ktp;

use Ktp\Parsers\NikResultPageParser;
use Ktp\Contracts\FinderInterface;

class Finder implements FinderInterface
{
    const BASE_URI = 'https://data.kpu.go.id/';
    const FIND_BY_NIK_URI = 'ss8.php';

    /**
     * HttpClient instance.
     *
     * @var \Ktp\Contracts\HttpClientInterface
     */
    protected $httpClient;

    /**
     * Create a new instance of Finder.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient(self::BASE_URI);
    }

    /**
     * Get the HttpClient instance.
     *
     * @return \Ktp\Contracts\HttpClientInterface
     */
    public function httpClient()
    {
        return $this->httpClient;
    }

    /**
     * Find by NIK.
     *
     * @param int $nik
     *
     * @return array|null
     */
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
