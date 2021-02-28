<?php

/*
 * This file is part of the roukmoute/dto-test package.
 *
 * (c) Mathias STRASSER <contact@roukmoute.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace DtoTester;

use ArrayIterator;

class SortedMap extends ArrayIterator
{
    /** @var string */
    private $typeOfKey;

    /** @var string */
    private $typeOfValue;

    public function __construct(string $typeOfKey, string $typeOfValue)
    {
        $this->typeOfKey = $typeOfKey;
        $this->typeOfValue = $typeOfValue;

        parent::__construct([]);
    }

    public function offsetSet($index, $newval)
    {
        $this->checkArgument($this->typeOfKey, $index);
        $this->checkArgument($this->typeOfValue, $newval, 2);

        parent::offsetSet($index, $newval);
    }

    public function append($value)
    {
        $this->checkArgument($this->typeOfValue, $value);

        parent::append($value);
    }

    public function rewind()
    {
        $this->ksort();
    }

    public function put($index, $newval)
    {
        $this->offsetSet($index, $newval);
    }

    private function checkArgument(string $typeOfValue, $value, int $argumentNb = 1): void
    {
        if (($value !== null)
            && (!\function_exists($func = 'is_' . $typeOfValue) || !$func($value))
            && !($value instanceof $typeOfValue)) {
            $backtrace = debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS)[1];
            throw new \TypeError(sprintf('Argument %d passed to %s::%s() must be of the type %s, int given', $argumentNb, $backtrace['class'], $backtrace['function'], $typeOfValue, gettype($value)));
        }
    }
}
