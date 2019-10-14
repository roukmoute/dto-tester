<?php

/*
 * This file is part of the roukmoute/dto-tester package.
 *
 * (c) Mathias STRASSER <contact@roukmoute.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
