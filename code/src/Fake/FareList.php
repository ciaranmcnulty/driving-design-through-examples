<?php

namespace Fake;

class FareList implements \FareList
{
    private $fares = [];

    public function listFare(\Route $route, \Fare $fare)
    {
        $this->fares[$route->asString()] = $fare;
    }

    public function findFareFor(\Route $route)
    {
        return $this->fares[$route->asString()];
    }
}