<?php

namespace drupol\Anonymize\tests\Stubs;

class ExampleClass
{
    public $publicProperty = 'publicProperty';
    protected $protectedProperty = 'protectedProperty';
    private $privateProperty = 'privateProperty';

    public function publicMethod()
    {
        return 'publicMethod';
    }

    public function renderProperties()
    {
        return $this->publicProperty . $this->privateProperty . $this->protectedProperty;
    }

    public function renderMethods()
    {
        return $this->publicMethod() . $this->privateMethod() . $this->protectedMethod();
    }

    protected function protectedMethod()
    {
        return 'protectedMethod';
    }

    private function privateMethod()
    {
        return 'privateMethod';
    }
}
