<?php

namespace Ktp\Contracts\Parsers;

use Psr\Http\Message\ResponseInterface;

interface PageParser
{
    /**
     * Get page content.
     *
     * @return string
     */
    public function page();

    /**
     * Get the Crawler instance.
     *
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    public function crawler();

    /**
     * Parse the page.
     *
     * @return array|null
     */
    public function parse();

    /**
     * Create a new instance from response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Ktp\Contracts\Parsers\PageParser
     */
    public static function fromResponse(ResponseInterface $response);
}
