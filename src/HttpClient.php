<?php

namespace Ktp;

use GuzzleHttp\Client as Guzzle;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;
use Ktp\Contracts\HttpClient as HttpClientContract;

class HttpClient extends Guzzle implements HttpClientContract
{
    protected $baseUri;

    public function __construct($baseUri)
    {
        $this->baseUri = $baseUri;

        parent::__construct([
            'base_uri' => $baseUri,
            'headers' => [
                'Accept' => 'text/html',
                'Accept-Encoding' => 'gzip, deflate, sdch',
                'Accept-Language' => 'en-US',
                'Host' => parse_url($baseUri, PHP_URL_HOST),
                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36',
            ],
        ]);
    }

    public function baseUri()
    {
        return $this->baseUri;
    }

    public function post($uri, array $data = [], array $options = [])
    {
        $options['form_params'] = $data;

        return $this->request('POST', $uri, $options);
    }
}
