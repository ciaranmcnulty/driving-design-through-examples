<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AirportSpec extends ObjectBehavior
{
    function it_can_be_represented_as_a_string()
    {
        $this->beConstructedFromCode('LHR');
        $this->asCode()->shouldReturn('LHR');
    }

    function it_cannot_be_created_with_invalid_code()
    {
        $this->beConstructedFromCode('1234566XXX');
        $this->shouldThrow(\Exception::class)->duringInstantiation();
    }
}
