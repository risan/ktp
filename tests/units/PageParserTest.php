<?php

use Ktp\Parsers\PageParser;
use Symfony\Component\DomCrawler\Crawler;

class PageParserTest extends PHPUnit_Framework_TestCase {
    /** @test */
    function page_parser_can_retrieve_page_content()
    {
        $pageParser = $this->getMockForAbstractClass(PageParser::class, ['foo']);

        $this->assertEquals('foo', $pageParser->page());
    }

    /** @test */
    function page_parser_can_instantiate_crawler()
    {
        $pageParser = $this->getMockForAbstractClass(PageParser::class, ['foo']);

        $this->assertInstanceOf(Crawler::class, $pageParser->crawler());
    }
}
