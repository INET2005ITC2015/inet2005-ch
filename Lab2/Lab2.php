<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/23/15
 * Time: 2:54 PM
 */

function createHeading($H, $message) {
    if($H >= 1 && $H <= 6) {
        echo "<h$H>$message</h$H>";
    }
}

?>