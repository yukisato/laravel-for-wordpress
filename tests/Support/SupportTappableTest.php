<?php

namespace Illuminate\Tests\Support;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Traits\Tappable;

class SupportTappableTest extends TestCase
{
    public function testTappableClassWithCallback()
    {
        $name = TappableClass::make()->tap(function ($tappable) {
            $tappable->setName('MyName');
        })->getName();

        $this->assertEquals('MyName', $name);
    }

    public function testTappableClassWithoutCallback()
    {
        $name = TappableClass::make()->tap()->setName('MyName')->getName();

        $this->assertEquals('MyName', $name);
    }
}

class TappableClass
{
    use Tappable;

    private $name;

    public static function make()
    {
        return new static;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
