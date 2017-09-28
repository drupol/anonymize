<?php

namespace drupol\Anonymize;

use drupol\DynamicObjects\DynamicObject;
use drupol\DynamicObjects\DynamicObjectsTrait;

/**
 * Trait AnonymizeTrait.
 *
 * @package drupol\Anonymize
 */
trait AnonymizeTrait
{
    /**
     * Convert an object into an anonymous object.
     *
     * @param $object
     *
     * @return Anonymize
     */
    public static function convertToAnonymous($object)
    {
        $reflection = new \ReflectionClass($object);
        $class = new class extends Anonymize {
        };

        foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            $method->setAccessible(true);
            $class::addDynamicMethod($method->name, $method->getClosure($object));
        }

        foreach ($reflection->getMethods(\ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE) as $method) {
            $method->setAccessible(false);
            $class::addDynamicMethod($method->name, $method->getClosure($object));
        }

        foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $property->setAccessible(true);
            $class::addDynamicProperty($property->name, $property->getValue($object));
        }

        return $class;
    }
}
