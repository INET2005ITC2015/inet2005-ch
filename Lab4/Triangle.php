<?php

class Triangle extends Shape implements iResize
{
    var $base;
    var $height;

    function __construct($base, $height, $percent)
    {
        $this->name = "Triangle";
        $this->base = $base;
        $this->height = $height * $this->resize($percent);
    }

    function getArea()
    {
        return ($this->base * $this->height) / 2;
    }

    function resize($percent)
    {
        return $percent /= 100;
    }

}// end Triangle class