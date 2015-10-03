<?php

class Ticket
{
    private $revenueFare;
    private $fare;

    private function __construct(Fare $fare)
    {
        $this->revenueFare = $fare;
        $this->fare = $fare;
    }

    public static function costing(Fare $fare)
    {
        return new Ticket($fare);
    }

    public function pay(Fare $fare)
    {
        $this->fare = $this->fare->deduct($fare);
    }

    public function isCompletelyPaid()
    {
        return $this->fare->isZero();
    }

    public function getPoints()
    {
        return $this->revenueFare->getPoints();
    }

}
