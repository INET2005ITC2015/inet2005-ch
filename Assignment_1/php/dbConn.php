<?php

function connect($dbName)
{
    $db = mysqli_connect("localhost", "root", "inet2005", "$dbName");
    if (!$db) {
        die('Could not connect to the Sakila Database: ' . mysqli_errno($db));
    }
    return $db;
}

function disconnect($db)
{
    mysqli_close($db);
}