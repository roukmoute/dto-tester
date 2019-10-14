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

class Constructor
{
    /** @var string */
    private $string;

    /** @var int */
    private $int;

    /** @var bool */
    private $bool;

    public function __construct(string $string, int $int, bool $bool)
    {
        $this->string = $string;
        $this->int = $int;
        $this->bool = $bool;
    }

    public function string(): string
    {
        return $this->string;
    }

    public function int(): int
    {
        return $this->int;
    }

    public function isBool(): bool
    {
        return $this->bool;
    }
}
