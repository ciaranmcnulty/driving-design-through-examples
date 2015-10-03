<?php

namespace spec;

use Airport;
use Fare;
use Flight;
use FlightNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Route;
use Ticket;

class TicketIssuerSpec extends ObjectBehavior
{
    function it_issues_a_ticket_with_the_correct_fare(\FareList $fareList)
    {
        $route = Route::fromTo(Airport::fromCode('LHR'), Airport::fromCode('MAN'));
        $flight = new Flight(FlightNumber::fromString('XX001'), $route);

        $fareList->findFareFor($route)->willReturn(Fare::fromString('50'));

        $this->beConstructedWith($fareList);

        $this->issueOn($flight)->shouldBeLike(Ticket::costing(Fare::fromString('50')));
    }
}
