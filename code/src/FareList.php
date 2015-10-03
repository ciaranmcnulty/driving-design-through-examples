<?php

interface FareList
{
    public function listFare(Route $route, Fare $fare);

    public function findFareFor(Route $route);
}
