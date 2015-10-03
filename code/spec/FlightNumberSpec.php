<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FlightNumberSpec extends ObjectBehavior
{
    function it_can_be_represented_as_a_string()
    {
        $this->beConstructedFromString('XX100');
        $this->asString()->shouldReturn('XX100');
    }
}
