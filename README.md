[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/anonymize.svg?style=flat-square)](https://packagist.org/packages/drupol/anonymize)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/anonymize.svg?style=flat-square)](https://packagist.org/packages/drupol/anonymize)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/anonymize.svg?style=flat-square)](https://packagist.org/packages/drupol/anonymize)
 [![Build Status](https://img.shields.io/travis/drupol/anonymize/master.svg?style=flat-square)](https://travis-ci.org/drupol/anonymize)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/drupol/anonymize/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/anonymize/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/drupol/anonymize/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/drupol/anonymize/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/drupol/anonymize/master)](https://stryker-mutator.github.io)
 [![License](https://img.shields.io/packagist/l/drupol/anonymize.svg?style=flat-square)](https://packagist.org/packages/drupol/anonymize)
 [![Say Thanks!](https://img.shields.io/badge/Say-thanks-brightgreen.svg?style=flat-square)](https://saythanks.io/to/drupol)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)
 
# Anonymize

## Description

Convert a regular class into an anonymous class.

## Features

* Converts public properties and methods into dynamic classes and properties.

## Requirements

* PHP >= 7.1.3

## Installation

`composer require drupol/anonymize`

## Usage

Using the object:

```php
<?php

include 'vendor/autoload.php';

class Hello
{
    public $property = 'YES!';

    public function say()
    {
        echo 'Hello ' . $this->world();
    }

    private function world()
    {
        return 'world!';
    }
}

$class = new Hello();
$class->say(); // Hello world!

$anonymizedClass = \drupol\Anonymize\Anonymize::convertToAnonymous($class);

$anonymizedClass::addDynamicMethod('say', function () use ($anonymizedClass) {
    echo 'Goodbye ' . $anonymizedClass->world();
});

$anonymizedClass::addDynamicMethod('world', function () {
    return 'universe!';
});

$anonymizedClass->say(); // Goodbye universe!
```

## API

```php
<?php

/**
 * Convert an object into an anonymous object.
 *
 * @param \stdClass $object
 *   The object to convert.  
 *
 * @return Anonymize
 */
AnonymizeTrait::convertToAnonymous($object);

```

The rest of the library API relies and inherit from [DynamicObjects](https://github.com/drupol/dynamicobjects).

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Travis CI](https://travis-ci.org/drupol/phptree/builds) run the tests and the benchmarks.

The library has tests written with [PHPSpec](http://www.phpspec.net/).
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP](https://github.com/phpro/grumphp), run `./vendor/bin/grumphp run` to check manually.

[PHPInfection](https://github.com/infection/infection) is used to ensure that your code is properly tested, run `composer infection` to test your code.

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)

## Sponsors

* [ARhS Development](https://www.arhs-group.com)
* [European Commission - DIGIT](https://github.com/ec-europa)
