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

    /** @var \DateTime */
    private $dateTime;

    /** @var \DateTimeZone */
    private $dateTimeZone;

    /** @var float */
    private $float;

    /** @var int */
    private $int;

    /** @var string */
    private $string;

    /** @var Primitive */
    private $primitive;

    /** @var self */
    private $primitiveImmutable;

    /** @var string */
    private $string2;

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

    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    public function dateTimeZone(): \DateTimeZone
    {
        return $this->dateTimeZone;
    }

    public function setDateTimeZone(\DateTimeZone $dateTimeZone): void
    {
        $this->dateTimeZone = $dateTimeZone;
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

    public function getPrimitive(): self
    {
        return $this->primitive;
    }

    public function setPrimitive(self $primitive): void
    {
        $this->primitive = $primitive;
    }

    public function primitiveImmutable(): self
    {
        return $this->primitiveImmutable;
    }

    public function string2(): string
    {
        return $this->string2;
    }

    public function setString2(string $string): void
    {
        $this->string2 = $string;
    }
}
