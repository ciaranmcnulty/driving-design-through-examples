<?php

class Airport
{
    private $code;

    private function __construct($code)
    {
        if (!preg_match('/^[A-Z]{3}$/', $code)) {
            throw new \InvalidArgumentException('Code is not valid');
        }

        $this->code = $code;
    }

    public static function fromCode($code)
    {
        return new Airport($code);
    }

    public function asCode()
    {
        return $this->code;
    }
}
