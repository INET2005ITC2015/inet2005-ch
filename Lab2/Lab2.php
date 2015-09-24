<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/23/15
 * Time: 2:54 PM
 * @param $H
 * @param $message
 */

function createHeading($H, $message) {
    if($H >= 1 && $H <= 6) {
        echo "<h$H>$message</h$H>";
    } else {
        echo "error this h tag is outside the bounds of 1-6";
    }
}//end createHeading
?>

<h3>Step #1</h3>

<?php
for($i=1; $i<8; $i++) {
    createHeading($i, "This is a h" . $i . " heading");
}// end for loop
?>

<h3>Step #2</h3>

<?php
$myString = "Hello World";
function appendByVal($s) {
    $s .= "...blah";
}// end appendByVal

function appendByRef(&$s) {
    $s .= "...blah";
}// end appendByRef

echo $myString . "<br />";
appendByVal($myString);
echo $myString . "<br />";
appendByRef($myString);
echo $myString . "<br />";
?>

<h3>Step #3</h3>

<?php


?>