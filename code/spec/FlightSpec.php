<?php

namespace spec;

use Airport;
use FlightNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Route;

class FlightSpec extends ObjectBehavior
{
    function it_exposes_route(FlightNumber $number, Route $route)
    {
        $this->beConstructedWith($number, $route);
        $this->getRoute()->shouldReturn($route);
    }
}
