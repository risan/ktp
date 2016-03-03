<?php

use Ktp\Parsers\NikResultPageParser;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;

class NikResultPageParserTest extends PHPUnit_Framework_TestCase {
    /** @test */
    function nik_page_parser_can_retrieve_page_content()
    {
        $pageParser = $this->getMockForAbstractClass(NikResultPageParser::class, ['foo']);

        $this->assertEquals('foo', $pageParser->page());
    }

    /** @test */
    function nik_page_parser_can_instantiate_crawler()
    {
        $pageParser = $this->getMockForAbstractClass(NikResultPageParser::class, ['foo']);

        $this->assertInstanceOf(Crawler::class, $pageParser->crawler());
    }

    /** @test */
    function nik_page_parser_can_be_instantiated_from_response()
    {
        $response = $this->getMockForAbstractClass(ResponseInterface::class);

        $response->expects($this->once())
            ->method('getBody')
            ->will($this->returnValue('foo'));

        $this->assertInstanceOf(NikResultPageParser::class, NikResultPageParser::fromResponse($response));
    }

    /** @test */
    function nik_page_parser_parse_should_return_null_when_nik_is_not_found()
    {
        $pageParser = $this->getMockForAbstractClass(NikResultPageParser::class, ['foo']);

        $this->assertNull($pageParser->parse());
    }

    /** @test */
    function nik_page_parser_can_parse_result_page()
    {
        $html = <<<EOD
<span class="field">123</span>
<span class="field">JOHN DOE</span>
<span class="field">LAKI-LAKI</span>
<span class="field">FOO</span>
<span class="field">BAR</span>
<span class="field">BAZ</span>
<span class="field">QUX</span>
EOD;

        $pageParser = $this->getMockForAbstractClass(NikResultPageParser::class, [$html]);

        $parsed = $pageParser->parse();

        $this->assertCount(7, $parsed);

        $this->assertEquals([
            'nik' => 123,
            'name' => 'JOHN DOE',
            'jenis_kelamin' => 'LAKI-LAKI',
            'kelurahan' => 'FOO',
            'kecamatan' => 'BAR',
            'kabupaten_kota' => 'BAZ',
            'provinsi' => 'QUX',
        ], $parsed);
    }
}
