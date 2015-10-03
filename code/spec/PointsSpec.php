<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PointsSpec extends ObjectBehavior
{
    function it_is_constructed_from_string()
    {
        $this->beConstructedFromString('100');
        $this->getWrappedObject();
    }
}
