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

namespace DtoTester;

use Roave\BetterReflection\Reflection\ReflectionMethod;

class GetterSetterPair
{
    /** @var ReflectionMethod */
    private $getter;

    /** @var ReflectionMethod */
    private $setter;

    public function getter(): ReflectionMethod
    {
        return $this->getter;
    }

    public function setter(): ReflectionMethod
    {
        return $this->setter;
    }

    public function hasGetterAndSetter(): bool
    {
        return $this->getter && $this->setter;
    }

    public function isImmutable(): bool
    {
        return $this->getter && !$this->setter;
    }

    public function setSetter(ReflectionMethod $method): void
    {
        $this->setter = $method;
    }

    public function setGetter(ReflectionMethod $method): void
    {
        $this->getter = $method;
    }
}
