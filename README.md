# KTP HTTP Client

[![Build Status](https://img.shields.io/travis/risan/ktp.svg?style=flat-square)](https://travis-ci.org/risan/ktp)
[![HHVM Tested](https://img.shields.io/hhvm/risan/ktp.svg?style=flat-square)](https://travis-ci.org/risan/ktp)
[![StyleCI](https://styleci.io/repos/53063075/shield?style=flat-square)](https://styleci.io/repos/53063075)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/risan/ktp.svg?style=flat-square)](https://scrutinizer-ci.com/g/risan/ktp/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/risan/ktp.svg?style=flat-square)](https://scrutinizer-ci.com/g/risan/ktp)
[![Latest Stable Version](https://img.shields.io/packagist/v/risan/ktp.svg?style=flat-square)](https://packagist.org/packages/risan/ktp)
[![License](https://img.shields.io/packagist/l/risan/ktp.svg?style=flat-square)](https://packagist.org/packages/risan/ktp)

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



