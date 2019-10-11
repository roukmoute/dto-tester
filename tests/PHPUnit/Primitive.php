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

class Primitive
{
    /** @var bool */
    private $bool;

    /** @var \DateTimeInterface */
    private $dateTimeInterface;

    /** @var float */
    private $float;

    /** @var int */
    private $int;

    /** @var string */
    private $string;

    public function isBool(): bool
    {
        return $this->bool;
    }

    public function setBool(bool $bool): void
    {
        $this->bool = $bool;
    }

    public function getDateTimeInterface(): \DateTimeInterface
    {
        return $this->dateTimeInterface;
    }

    public function setDateTimeInterface(\DateTimeInterface $dateTimeInterface): void
    {
        $this->dateTimeInterface = $dateTimeInterface;
    }

    public function getFloat(): float
    {
        return $this->float;
    }

    public function setFloat(float $float): void
    {
        $this->float = $float;
    }

    public function getInt(): int
    {
        return $this->int;
    }

    public function setInt(int $int): void
    {
        $this->int = $int;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function setString(string $string): void
    {
        $this->string = $string;
    }
}
