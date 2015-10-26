<?php

class Rectangle extends Shape
{
    var $width;
    var $height;

    function __construct($height, $width)
    {
        $this->name = "Rectangle";
        $this->height = $height;
        $this->width = $width;
    }

    function getArea()
    {
        return $this->height * $this->width;
    }

}// end Rectangle class