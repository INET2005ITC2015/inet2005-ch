<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Lab 4</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require_once 'Shape.php';
    require_once 'Interfaces.php';
    require_once 'Circle.php';
    require_once 'Triangle.php';
    require_once 'Rectangle.php';
    ?>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Rectangle</legend>
        <label for="height">Height: </label>
        <input name="height" id="height" type="text" value="<?= $_POST['height'] ?>">
        <label for="width">Width: </label>
        <input name="width" id="width" type="text" value="<?= $_POST['width'] ?>">
    </fieldset>
    <fieldset>
        <legend>Circle</legend>
        <label for="radius">Radius: </label>
        <input name="radius" id="radius" type="text" value="<?= $_POST['radius'] ?>">
    </fieldset>
    <fieldset>
        <legend>Triangle</legend>
        <label for="base">Base: </label>
        <input name="base" id="base" type="text" value="<?= $_POST['base'] ?>">
        <label for="tall">Height: </label>
        <input name="tall" id="tall" type="text" value="<?= $_POST['tall'] ?>">
    </fieldset>
    <fieldset>
        <legend>Percentage Resizing for Circle & Triangle</legend>
        <label for="resize">Size (%): </label>
        <input type="text" name="resize" id="resize" value="100">
    </fieldset>
    <input type="submit" value="Calculate">
</form>
<?php
if (!empty($_POST['height']) && !empty($_POST['width'])) {
    $myRectangle = new Rectangle($_POST['height'], $_POST['width']);
    echo "<h3>Shapes: Rectangle</h3><p>Area: " . $myRectangle->getArea() . "</p>";
}
if (!empty($_POST['radius'])) {
    $myCircle = new Circle($_POST['radius'], $_POST['resize']);
    echo "<h3>Shapes: Circle</h3><p>Area: " . $myCircle->getArea() . "</p>";
}
if (!empty($_POST['base']) && !empty($_POST['tall'])) {
    $myTriangle = new Triangle($_POST['base'], $_POST['tall'], $_POST['resize']);
    echo "<h3>Shape: Triangle</h3><p>Area: " . $myTriangle->getArea() . "</p>";
}
?>
</body>
</html>