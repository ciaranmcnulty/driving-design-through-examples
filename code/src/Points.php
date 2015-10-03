<?php

class Points
{
    private $points;

    private function __construct($points)
    {
        $this->points = $points;
    }

    public static function fromString($string)
    {
        return new Points((int)$string);
    }
}
