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

namespace Spec\DtoTester;

use DtoTester\SortedMap;
use PhpSpec\ObjectBehavior;
use Webmozart\Assert\Assert;

class SortedMapSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('string', 'string');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SortedMap::class);
    }

    public function it_sets_the_value_at_the_specified_index()
    {
        $this->offsetSet('my_string_key', 'my_string_value');

        $this->offsetGet('my_string_key')->shouldReturn('my_string_value');
    }

    public function it_puts_the_value_at_the_specified_index()
    {
        $this->put('my_string_key', 'my_string_value');

        $this->offsetGet('my_string_key')->shouldReturn('my_string_value');
    }

    public function it_throws_when_type_of_key_is_incorrect_during_offsetSet()
    {
        $this
            ->shouldThrow(
                new \TypeError(
                    'Argument 1 passed to DtoTester\SortedMap::offsetSet() must be of the type string, int given'
                )
            )
            ->duringOffsetSet(1, 'my_string_value')
        ;
    }

    public function it_throws_when_type_of_value_is_incorrect_during_offsetSet()
    {
        $this
            ->shouldThrow(
                new \TypeError(
                    'Argument 2 passed to DtoTester\SortedMap::offsetSet() must be of the type string, int given'
                )
            )
            ->duringOffsetSet('my_string_key', 1)
        ;
    }

    public function it_appends_a_value()
    {
        $this->append('my_string_value');

        $this->offsetGet(0)->shouldReturn('my_string_value');
    }

    public function it_is_ordered_according_to_the_natural_ordering_of_its_keys()
    {
        $this->beConstructedWith('int', 'string');

        $this->put(3, '3');
        $this->put(2, '2');
        $this->put(1, '1');
        $this->put(4, '4');

        $expect = ['1', '2', '3', '4'];

        foreach ($this->getWrappedObject() as $value) {
            Assert::string($value);
            Assert::same($value, array_shift($expect));
        }
    }
}
