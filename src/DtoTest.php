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

use PHPUnit\Framework\TestCase;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use RuntimeException;

abstract class DtoTest extends TestCase
{
    /** @var MapperCollection */
    private $mappers;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->mappers = MapperCollection::defaultMappers();

        parent::__construct($name, $data, $dataName);
    }

    public function testGettersAndSetters()
    {
        $getterSetterMapping = new SortedMap('string', GetterSetterPair::class);

        $instance = $this->getInstance();

        $this->findMappings($instance, $getterSetterMapping);
        $this->assetMappings($getterSetterMapping, $instance);
    }

    abstract protected function getInstance();

    private function findMappings($instance, SortedMap $getterSetterMapping): void
    {
        foreach (ReflectionClass::createFromInstance($instance)->getMethods() as $method) {
            $methodName = $method->getName();
            $numberOfParameters = $method->getNumberOfParameters();

            if ((mb_substr($methodName, 0, 3) === 'get' && $numberOfParameters === 0)
                || (mb_substr($methodName, 0, 3) === 'set' && $numberOfParameters === 1)
                || (mb_substr($methodName, 0, 2) === 'is' && $numberOfParameters === 0)
            ) {
                $objectName = mb_substr($methodName, mb_substr($methodName, 0, 2) === 'is' ? 2 : 3);

                $getterSettingPair = $this->getterSettingPair($getterSetterMapping, $objectName);

                if (mb_substr($methodName, 0, 3) === 'set') {
                    $getterSettingPair->setSetter($method);
                } else {
                    $getterSettingPair->setGetter($method);
                }
            }
        }
    }

    private function getterSettingPair(SortedMap $getterSetterMapping, string $objectName): GetterSetterPair
    {
        if (isset($getterSetterMapping[$objectName])) {
            return $getterSetterMapping[$objectName];
        }

        $getterSettingPair = new GetterSetterPair();
        $getterSetterMapping[$objectName] = $getterSettingPair;

        return $getterSettingPair;
    }

    private function assetMappings(SortedMap $getterSetterMapping, $instance): void
    {
        /** @var GetterSetterPair $pair */
        foreach ($getterSetterMapping as $objectName => $pair) {
            $fieldName = mb_strtolower($objectName[0]) . mb_substr($objectName, 1);

            if ($pair->hasGetterAndSetter()) {
                $parameterType = $pair->setter()->getParameters()[0]->getType();
                $newObject = $this->createObject($fieldName, (string) $parameterType);

                $pair->setter()->invoke($instance, $newObject);

                $this->callGetter($fieldName, $pair->getter(), $instance, $newObject);
            }
        }
    }

    private function createObject(string $fieldName, string $class)
    {
        try {
            return $this->mappers->get($class)();
        } catch (\Exception $exception) {
            throw new RuntimeException(sprintf('Unable to create objects for field "%s".', $fieldName));
        }
    }

    private function callGetter(string $fieldName, ReflectionMethod $getter, $instance, $expected): void
    {
        if ($getter->getReturnType()->isBuiltin()) {
            $this->assertEquals($expected, $getter->invoke($instance), sprintf('"$%s" is different', $fieldName));
        } else {
            $this->assertSame($expected, $getter->invoke($instance), sprintf('"$%s" is different', $fieldName));
        }
    }
}
