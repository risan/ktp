<?php

namespace Ktp\Parsers;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;

abstract class PageParser
{
    /**
     * Page content.
     *
     * @var string
     */
    protected $page;

    /**
     * Create a new instance of PageParser.
     *
     * @param string $page
     */
    public function __construct($page)
    {
        $this->page = $page;
    }

    /**
     * Get page content.
     *
     * @return string
     */
    public function page()
    {
        return $this->page;
    }

    /**
     * Get the Crawler instance.
     *
     * @return Symfony\Component\DomCrawler\Crawler
     */
    public function crawler()
    {
        $crawler = new Crawler();

        $crawler->addHtmlContent($this->page());

        return $crawler;
    }

    /**
     * Parse the page.
     *
     * @return array|null
     */
    abstract public function parse();

    /**
     * Create a new instance from response.
     *
     * @param Psr\Http\Message\ResponseInterface $response
     *
     * @return Ktp\Contracts\Parsers\PageParser
     */
    public static function fromResponse(ResponseInterface $response)
    {
        return new static($response->getBody());
    }
}
