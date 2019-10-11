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

class MapperCollection
{
    private $collection;

    public function __construct()
    {
        $this->collection = [];
    }

    public static function defaultMappers()
    {
        $self = new self();

        $self->put('array', function () {return []; });
        $self->put('bool', function () {return true; });
        $self->put('float', function () {return 0.0; });
        $self->put('int', function () {return 0; });
        $self->put('string', function () {return ''; });

        $self->put(\DateInterval::class, function () {return new \DateInterval(); });
        $self->put(\DatePeriod::class, function () {return new \DatePeriod(); });
        $self->put(\DateTime::class, function () {return new \DateTime(); });
        $self->put(\DateTimeImmutable::class, function () {return new \DateTimeImmutable(); });
        $self->put(\DateTimeInterface::class, function () {return new \DateTimeImmutable(); });
        $self->put(\DateTimeZone::class, function () {return new \DateTimeZone(); });

        return $self;
    }

    public function put(string $class, callable $supplier)
    {
        $this->collection[$class] = $supplier;
    }

    public function get(string $class)
    {
        return $this->collection[$class];
    }
}
