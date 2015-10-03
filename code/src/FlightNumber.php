<?php

class FlightNumber
{
    private $string;

    private function __construct($string)
    {
        $this->string = $string;
    }

    public static function fromString($string)
    {
        return new FlightNumber($string);
    }

    public function asString()
    {
        return $this->string;
    }
}
