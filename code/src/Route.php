<?php

class Route
{
    /**
     * @var Airport
     */
    private $origin;

    /**
     * @var Airport
     */
    private $destination;

    private function __construct(Airport $origin, Airport $destination)
    {
        $this->origin = $origin;
        $this->destination = $destination;
    }

    public static function fromTo(Airport $origin, Airport $destination)
    {
        return new Route($origin, $destination);
    }

    public function asString()
    {
        return $this->origin->asCode() . ' to ' . $this->destination->asCode();
    }

}
