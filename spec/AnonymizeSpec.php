<?php

declare(strict_types = 1);

namespace spec\drupol\Anonymize;

use drupol\Anonymize\Anonymize;
use drupol\Anonymize\tests\Stubs\ExampleClass;
use PhpSpec\ObjectBehavior;

class AnonymizeSpec extends ObjectBehavior
{
    public function it_can_convert_a_class_into_an_anonymous_class()
    {
        $class = new ExampleClass();
        $anon = $this::convertToAnonymous($class);

        $anon->publicProperty->shouldBe('publicProperty');
        $anon->protectedProperty->shouldBe('protectedProperty');
        $anon->privateProperty->shouldBe('privateProperty');
        $anon->renderProperties()->shouldBe($class->renderProperties());

        $anon->publicMethod()->shouldBe('publicMethod');
        $anon->protectedMethod()->shouldBe('protectedMethod');
        $anon->privateMethod()->shouldBe('privateMethod');
        $anon->renderMethods()->shouldBe($class->renderMethods());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Anonymize::class);
    }
}
