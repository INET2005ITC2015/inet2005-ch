<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Lab 4</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php

abstract class Shape
{
    var $name;
    abstract function getArea();
}// end Shape class

class Rectangle extends Shape
{
    var $width;
    var $height;

    function Rectangle($height, $width)
    {
        $this->name = "Rectangle";
        $this->height = $height;
        $this->width = $width;
    }

    function getArea()
    {
        return $this->height * $this->width;
    }

}// end Square class

class Circle extends Shape
{
    var $radius;

    function Circle($radius)
    {
        $this->name = "Circle";
        $this->radius = $radius;
    }

    function getArea()
    {
        return pi() * (pow($this->radius, 2));
    }

}// end Circle class

class Triangle extends Shape
{
    var $base;
    var $height;

    function Triangle($base, $height)
    {
        $this->name = "Triangle";
        $this->base = $base;
        $this->height = $height;
    }

    function getArea()
    {
        return ($this->base * $this->height) / 2;
    }

}// end Triangle class
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Rectangle</legend>
        <label for="height">Height: </label>
        <input name="height" id="height" type="text">
        <label for="width">Width: </label>
        <input name="width" id="width" type="text">
    </fieldset>
    <fieldset>
        <legend>Circle</legend>
        <label for="radius">Radius: </label>
        <input name="radius" id="radius" type="text">
    </fieldset>
    <fieldset>
        <legend>Triangle</legend>
        <label for="base">Base: </label>
        <input name="base" id="base" type="text">
        <label for="tall">Height: </label>
        <input name="tall" id="tall" type="text">
    </fieldset>
    <input type="submit" value="Calculate">
</form>
<?php
if (!empty($_POST['height']) && !empty($_POST['width'])) {
    $myRectangle = new Rectangle($_POST['height'], $_POST['width']);
    echo "<h3>Shapes: Rectangle</h3><p>Area: " . $myRectangle->getArea() . "</p>";
}
if (!empty($_POST['radius'])) {
    $myCircle = new Circle($_POST['radius']);
    if (isset($_POST['circleResize']) && !empty($_POST['circleResize'])) {
        $myCircle->radius *= $_POST['circleResize'];
    }
    echo "<h3>Shapes: Circle</h3><p>Area: " . $myCircle->getArea() . "</p>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input name="radius" type="hidden" value="<? $_POST['radius'] ?>">
        <label for="circleResize">Resize: </label>
        <input name="circleResize" id="circleResize" type="text">
        <input type="submit" value="Resize Circle">
    </form>
    <?php
}
if (!empty($_POST['base']) && !empty($_POST['tall'])) {
    $myTriangle = new Triangle($_POST['base'], $_POST['tall']);
    if (isset($_POST['triangleResize']) && !empty($_POST['triangleResize'])) {
        $myTriangle->height *= $_POST['triangleResize'];
    }
    echo "<h3>Shape: Triangle</h3><p>Area: " . $myTriangle->getArea() . "</p>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input name="tall" type="hidden" value="<? $_POST['tall'] ?>">
        <input name="base" type="hidden" value="<? $_POST['base'] ?>">
        <label for="triangleResize">Resize: </label>
        <input name="triangleResize" id="triangleResize" type="text">
        <input type="submit" value="Resize Triangle">
    </form>
    <?php
}
?>
</body>
</html>