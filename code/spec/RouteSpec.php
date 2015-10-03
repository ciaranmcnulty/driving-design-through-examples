<?php

namespace spec;

use Airport;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouteSpec extends ObjectBehavior
{

    function it_has_a_string_representation()
    {
        $this->beConstructedFromTo(Airport::fromCode('LHR'), Airport::fromCode('MAN'));
        $this->asString()->shouldReturn('LHR to MAN');
    }
}
