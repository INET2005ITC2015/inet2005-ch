<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/3/15
 * Time: 7:14 PM
 */

function connectToSakila()
{
    $db = mysqli_connect("localhost", "root", "inet2005", "sakila");
    if (!$db) {
        die('Could not connect to the Sakila Database: ' . mysqli_errno($db));
    } else {
        echo "<h1>Connection Established</h1>";
    }
}

function disconnect($db)
{
    mysqli_close($db);
}