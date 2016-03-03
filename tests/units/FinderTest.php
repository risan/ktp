<?php

use Ktp\Finder;
use Ktp\Contracts\HttpClient as HttpClientContract;

class FinderTest extends PHPUnit_Framework_TestCase {
    /** @test */
    function finder_has_http_client()
    {
        $finder = new Finder;

        $this->assertInstanceOf(HttpClientContract::class, $finder->httpClient());
    }

    /** @test */
    function finder_find_return_null_when_nik_is_not_found()
    {
        $finder = new Finder;

        $this->assertNull($finder->findByNik(123));
    }
}
