<?php

class TicketIssuer
{
    private $fareList;

    public function __construct(FareList $fareList)
    {
        $this->fareList = $fareList;
    }

    public function issueOn(Flight $flight)
    {
       return Ticket::costing($this->fareList->findFareFor($flight->getRoute()));
    }
}
