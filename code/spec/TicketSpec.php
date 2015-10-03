<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TicketSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedCosting(\Fare::fromString("100.00"));
    }

    function it_is_not_completely_paid_initially()
    {
        $this->shouldNotBeCompletelyPaid();
    }

    function it_is_not_paid_completely_if_it_is_partly_paid()
    {
        $this->pay(\Fare::fromString("50.00"));

        $this->shouldNotBeCompletelyPaid();
    }

    function it_can_be_paid_completely()
    {
        $this->pay(\Fare::fromString("100.00"));

        $this->shouldBeCompletelyPaid();
    }

    function it_gets_points_from_original_fare()
    {
        $this->pay(\Fare::fromString("50"));
        $this->getPoints()->shouldBeLike(\Points::fromString('100'));
    }
}
