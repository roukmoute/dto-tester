<?php

declare(strict_types=1);

namespace PHPUnit;

use DtoTester\DtoTest;

class ContructorTest extends DtoTest
{
    protected function getInstance()
    {
        return new Constructor('string', 42, false);
    }
}
