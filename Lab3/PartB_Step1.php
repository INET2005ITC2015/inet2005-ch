<?php
if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    require_once('dbConnection.php');

    $db = connectToSakila();

    $result = mysqli_query($db, "INSERT INTO actor (first_name, last_name)
    VALUES ('" . $firstName . "', '" . $lastName . "')");

    if (!$result) {
        die ("Could not insert record into the Sakila Database: " . mysqli_error($db));
    } else {
        echo "Actor Inserted";
    }
    disconnect($db);
}