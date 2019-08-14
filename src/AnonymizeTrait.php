<?php

declare(strict_types=1);

namespace drupol\Anonymize;

/**
 * Trait AnonymizeTrait.
 */
trait AnonymizeTrait
{
    /**
     * Convert an object into an anonymous object.
     *
     * @param object $object
     *
     * @throws \ReflectionException
     *
     * @return Anonymize
     */
    public static function convertToAnonymous($object)
    {
        $reflection = new \ReflectionClass($object);
        $class = new class() extends Anonymize {
        };

        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            $closure = $method->getClosure($object);

            if ($closure instanceof \Closure) {
                $class::addDynamicMethod($method->name, $closure);
            }
        }

        $methods = $reflection->getMethods(\ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PRIVATE);

        foreach ($methods as $method) {
            $closure = $method->getClosure($object);

            if ($closure instanceof \Closure) {
                $class::addDynamicMethod($method->name, $closure);
            }
        }

        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $class::addDynamicProperty($property->name, $property->getValue($object));
        }

        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $class::addDynamicProperty($property->name, $property->getValue($object));
        }

        return $class;
    }
}
