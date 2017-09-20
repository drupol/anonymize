<?php

namespace spec\drupol\Anonymize;

use drupol\Anonymize\Anonymize;
use drupol\Anonymize\test\ExampleClass;
use PhpSpec\ObjectBehavior;

class AnonymizeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Anonymize::class);
    }

    public function it_can_convert_a_class_into_an_anonymous_class()
    {
        $class = new ExampleClass();
        $this::convertToAnonymous($class)->renderProperties()->shouldBe($class->renderProperties());
        $this::convertToAnonymous($class)->renderMethods()->shouldBe($class->renderMethods());
    }
}
