<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/24/15
 * Time: 7:00 PM
 */

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$feet = $_POST['hFeet'];
$inches = $_POST['hInches'];
$meters = 0.0254 * ((12 * $feet) + $inches);

echo "<h3>Your first name is $firstName</h3>";
echo "<h3>Your last name is $lastName</h3>";
echo "<h3>Your height in meters is $meters</h3>";

?>