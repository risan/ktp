<?php

namespace Ktp\Parsers;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;

abstract class PageParser
{
    protected $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function page()
    {
        return $this->page;
    }

    public function crawler()
    {
        $crawler = new Crawler();

        $crawler->addHtmlContent($this->page());

        return $crawler;
    }

    abstract public function parse();

    public static function fromResponse(ResponseInterface $response)
    {
        return new static($response->getBody());
    }
}
