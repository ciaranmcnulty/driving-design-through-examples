<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;


/**
 * Defines application features from the specific context.
 */
class FlightsContext implements Context, SnippetAcceptingContext
{
    /**
     * @Transform :flightnumber
     */
    public function transformFlightNumber($number)
    {
        return FlightNumber::fromString($number);
    }

    /**
     * @Transform :origin
     * @Transform :destination
     */
    public function transformAirport($code)
    {
        return Airport::fromCode($code);
    }

    /**
     * @Transform :fare
     */
    public function transformFare($string)
    {
        return Fare::fromString($string);
    }

    /**
     * @Transform :points
     */
    public function transformPoints($string)
    {
        return Points::fromString($string);
    }

    /**
     * @Given a flight :flightnumber flies the :origin to :destination route
     */
    public function aFlightGoesFromTo(
        FlightNumber $flightnumber,
        Airport $origin,
        Airport $destination
    )
    {
        //throw new PendingException;
        $this->flight = new Flight(
            $flightnumber, Route::fromTo($origin, $destination)
        );
    }

    /**
     * @Given the current listed fare for the :origin to :destination route is £:fare
     */
    public function theCurrentListedFareForTheToRouteIsPs(
        Airport $origin,
        Airport $destination,
        Fare $fare
    )
    {
        //throw new PendingException;
        $this->fareList = new Fake\FareList();
        $this->fareList->listFare(
            Route::fromTo($origin,$destination),
            $fare
        );
    }

    /**
     * @When I am issued a ticket on flight :flight
     */
    public function iAmIssuedATicketOnFlight()
    {
        //throw new PendingException;
        $ticketIssuer = new TicketIssuer($this->fareList);
        $this->ticket = $ticketIssuer->issueOn($this->flight);
    }

    /**
     * @When I pay £:fare cash for the ticket
     */
    public function iPayPsCashForTheTicket(Fare $fare)
    {
        $this->ticket->pay($fare);
    }

    /**
     * @Then the ticket should be completely paid
     */
    public function theTicketShouldBeCompletelyPaid()
    {
        //throw new PendingException;
        assert($this->ticket->isCompletelyPaid() == true);
    }

    /**
     * @Then the ticket should be worth :points loyalty points
     */
    public function iTheTicketShouldBeWorthLoyaltyPoints(Points $points)
    {
        assert($this->ticket->getPoints() == $points);
    }


}
