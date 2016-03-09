# KTP HTTP Client

[![Build Status](https://travis-ci.org/risan/ktp.svg?branch=master)](https://travis-ci.org/risan/ktp)
[![HHVM Status](http://hhvm.h4cc.de/badge/risan/ktp.svg?style=flat)](http://hhvm.h4cc.de/package/risan/ktp)
[![StyleCI](https://styleci.io/repos/53063075/shield?style=flat)](https://styleci.io/repos/53063075)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/risan/ktp/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/risan/ktp/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/risan/ktp/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/risan/ktp/?branch=master)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/a554870b-5b0a-46d9-80fc-bd7698fdd034.svg)](https://insight.sensiolabs.com/projects/a554870b-5b0a-46d9-80fc-bd7698fdd034)
[![Latest Stable Version](https://poser.pugx.org/risan/ktp/v/stable)](https://packagist.org/packages/risan/ktp)
[![License](https://poser.pugx.org/risan/ktp/license)](https://packagist.org/packages/risan/ktp)

PHP HTTP client library for finding 2014 Indonesian presidential election voter's data based on it's NIK. The data is directly scraped from [KPU website](https://data.kpu.go.id/ss8.php) website.

## Table of Contents

* [Dependencies](#dependencies)
* [Installation](#installation)
* [How to Use](#how-to-use)

## Dependencies

This package powered by the following awesome libraries:

* [Guzzle](https://github.com/guzzle/guzzle)
* [Symfony DomCrawler Component](https://github.com/symfony/dom-crawler)
* [Symfony CssSelector Component](https://github.com/symfony/css-selector)

## Installation

The recommended way to install this package is through [Composer](https://getcomposer.org/). With the Composer installed on your machine, simply run the following command inside your project directory:

```bash
composer require risan/ktp
```

You may also add `risan\ktp` package directly into your `composer.json` file:

```bash
"require": {
  "risan/ktp": "~1.0"
}
```

Once your `composer.json` file is updated, run the following command to install it:

```bash
composer install
```

## How to Use

Here's some example about how to use this package:

```php
// Include composer autoloder file.
require 'vendor/autoload.php';

// Create a new instance Ktp\Finder.
$ktp = new Ktp\Finder();

// Find a voter's data by it's NIK.
$data = $ktp->findByNik(1122330108901234);

// Voter's data is not found.
if (is_null($data)) {
    die('Not found!');
}

print_r($data);
```

If the given NIK is not found, the `findByNik()` method will return a `null` value.

If the given NIK is found, the `findByNik()` will return an array that holds the voter's data. The returned array will have the following structure:

```php
Array
(
    [nik] => 1122330108901234
    [name] => RISAN BAGJA
    [jenis_kelamin] => LAKI-LAKI
    [kelurahan] => KAMPUNG BARU
    [kecamatan] => BANDA
    [kabupaten_kota] => MALUKU TENGAH
    [provinsi] => MALUKU UTARA
)
```



