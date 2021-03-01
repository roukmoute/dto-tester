# DTO Tester

[![CI](https://github.com/roukmoute/dto-tester/actions/workflows/CI.yml/badge.svg)](https://github.com/roukmoute/dto-tester/actions/workflows/CI.yml)

Automatically PHPUnit Test DTO and Transfer Objects.

Original idea: [Automatically JUnit Test DTO and Transfer Objects](https://objectpartners.com/2016/02/16/automatically-junit-test-dto-and-transfer-objects/)  

## Installation

These commands requires you to have [Composer](https://getcomposer.org/download/) installed globally.  
Open a command console, enter your project directory and execute the following 
commands to download the latest stable version:

```sh
composer require --dev roukmoute/dto-tester
```

## Usage

All we need to do is extend `DtoTester\DtoTest` and create a test instance and 
the `DtoTest` class will do the rest.

Here it is an example class named `FooBar`:

```php
<?php

class FooBarTest extends \DtoTester\DtoTest
{
    protected function getInstance()
    {
        return new FooBar();
    }
}
```

So we now turned what would have been many boring unit tests which didn’t test 
any real business logic into a simple file with less than 10 lines of code.
