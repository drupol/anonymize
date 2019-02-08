<?php

declare(strict_types = 1);

namespace drupol\Anonymize;

use drupol\DynamicObjects\AbstractDynamicObject;

/**
 * Class AbstractAnonymize.
 */
abstract class AbstractAnonymize extends AbstractDynamicObject
{
    use AnonymizeTrait;
}
