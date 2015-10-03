<?php

class Fare
{
    private $pence;

    private function __construct($pence)
    {
        $this->pence = $pence;
    }

    public static function fromString($string)
    {
        return new Fare((int)$string*100);
    }

    public function deduct(Fare $amount)
    {
        return new self($this->pence - $amount->pence);
    }

    public function isZero()
    {
        return $this->pence == 0;
    }

    public function getPoints()
    {
        return \Points::fromString($this->pence / 100);
    }
}
