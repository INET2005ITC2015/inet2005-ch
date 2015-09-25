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

$fileTmpName = $_FILES['userFile']['tmp_name'];
$fileOrigName = $_FILES['userFile']['name'];
$fileSize = $_FILES['userFile']['size'];
$fileErrorUpload = $_FILES['userFile']['error'];
$result = move_uploaded_file($fileTmpName, "uploads/$fileOrigName");

echo "<h3>Your first name is $firstName</h3>";
echo "<h3>Your last name is $lastName</h3>";
echo "<h3>Your height in meters is $meters m</h3>";
echo "<h3>TMP: $fileTmpName <br /> Orig: $fileOrigName <br /> Size: $fileSize <br /> Error: $fileErrorUpload</h3>";

?>