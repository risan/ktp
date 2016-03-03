<?php

namespace Ktp\Parsers;

use Ktp\Contracts\Parsers\PageParser as PageParserContract;

class NikResultPageParser extends PageParser implements PageParserContract
{
    /**
     * Parse the page.
     *
     * @return array|null
     */
    public function parse()
    {
        $fields = $this->fields();

        if (count($fields) === 0) {
            return;
        }

        return [
            'nik' => $this->parseIntFromNode($fields->eq(0)),
            'name' => $this->parseTextFromNode($fields->eq(1)),
            'jenis_kelamin' => $this->parseTextFromNode($fields->eq(2)),
            'kelurahan' => $this->parseTextFromNode($fields->eq(3)),
            'kecamatan' => $this->parseTextFromNode($fields->eq(4)),
            'kabupaten_kota' => $this->parseTextFromNode($fields->eq(5)),
            'provinsi' => $this->parseTextFromNode($fields->eq(6)),
        ];
    }

    /**
     * Get all fields node.
     *
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    protected function fields()
    {
        return $this->crawler()->filter('span.field');
    }

    /**
     * Parse text from crawler node.
     *
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param mixed                                 $default
     *
     * @return mixed
     */
    protected function parseTextFromNode($node, $default = null)
    {
        $text = trim($node->text());

        if (strlen($text) === 0) {
            return $default;
        }

        return $text;
    }

    /**
     * Parse integer from crawler node.
     *
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param mixed                                 $default
     *
     * @return mixed
     */
    protected function parseIntFromNode($node, $default = null)
    {
        $value = $this->parseTextFromNode($node);

        if (is_null($value)) {
            return $default;
        }

        return (int) $value;
    }
}
