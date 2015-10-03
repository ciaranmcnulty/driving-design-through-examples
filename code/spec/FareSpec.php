<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FareSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedFromString('100.00');
    }

    function it_can_deduct_an_amount()
    {
        $this->deduct(\Fare::fromString('10'))->shouldBeLike(\Fare::fromString('90.00'));
    }

    function it_knows_when_it_is_zero()
    {
        $this->beConstructedFromString('0.00');
        $this->isZero()->shouldReturn(true);
    }

    function it_is_not_zero_when_it_has_a_value()
    {
        $this->isZero()->shouldReturn(false);
    }

    function it_calculates_points()
    {
        $this->getPoints()->shouldBeLike(\Points::fromString(100));
    }
}
