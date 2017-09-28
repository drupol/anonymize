<?php

namespace drupol\Anonymize;

use drupol\DynamicObjects\DynamicObject;

/**
 * Class AbstractAnonymize.
 *
 * @package drupol\Anonymize
 */
abstract class AbstractAnonymize extends DynamicObject
{
    use AnonymizeTrait;
}
