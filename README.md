[![Build Status](https://www.travis-ci.org/drupol/anonymize.svg?branch=master)](https://www.travis-ci.org/drupol/anonymize)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/drupol/anonymize/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drupol/anonymize/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/drupol/anonymize/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/drupol/anonymize/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/drupol/anonymize/v/stable)](https://packagist.org/packages/drupol/anonymize)
[![Total Downloads](https://poser.pugx.org/drupol/anonymize/downloads)](https://packagist.org/packages/drupol/anonymize)
[![License](https://poser.pugx.org/drupol/anonymize/license)](https://packagist.org/packages/drupol/anonymize)

# Anonymize

## Description

Convert a regular class into an anonymous class.

## Features

* Converts public properties and methods into dynamic classes and properties.

## Requirements

* PHP >= 7.0

## Installation

`composer require drupol/anonymize`

## Usage

Using the object:

```php
<?php

include 'vendor/autoload.php';

class hello {

    public $property = "YES!";

    public function say() {
        echo "Hello " . $this->world();
    }

    private function world() {
        return 'world!';
    }
}

$class = new Hello();

$myObject = \drupol\Anonymize\Anonymize::convertToAnonymous($class);
$myObject->say(); // Hello world!

```

## API

```php
/**
 * Convert an object into an anonymous object.
 *
 * @param $object
 *   The object to convert.  
 *
 * @return Anonymize
 */
AnonymizeTrait::convertToAnonymous($object);

```

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)

## Sponsors

* [ARhS Development](https://www.arhs-group.com)
* [European Commission - DIGIT](https://github.com/ec-europa)
