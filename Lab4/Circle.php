<?php

class Circle extends Shape implements iResize
{
    var $radius;

    function __construct($radius, $percent)
    {
        $this->name = "Circle";
        $this->radius = $radius * $this->resize($percent);
    }

    function getArea()
    {
        return pi() * (pow($this->radius, 2));
    }

    function resize($percent)
    {
        return $percent /= 100;
    }

}// end Circle class
