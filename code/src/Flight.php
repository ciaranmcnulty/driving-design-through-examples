<?php

class Flight
{
    private $flightNumber;
    private $route;

    public function __construct(FlightNumber $flightNumber, Route $route)
    {
        $this->flightNumber = $flightNumber;
        $this->route = $route;
    }

    public function getRoute()
    {
        return $this->route;
    }
}
