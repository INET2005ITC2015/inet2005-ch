<?php
if (isset($_POST['idToUpdate']) && isset($_POST['fName']) && isset($_POST['lName'])) {
    $id = $_POST['idToUpdate'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    require_once "dbConnection.php";
    $db = connectToSakila();
    if (!$db) {
        die ("Could not connect to Sakila Database" . mysqli_error($db));
    }
    $result = mysqli_query($db, "UPDATE actor SET first_name='$firstName', last_name='$lastName'
              WHERE actor_id = $id");
    if (!$result) {
        die('Could not update records in the Sakila Database: ' . mysqli_error($db));
    }
    $numberOfAffectedRows = mysqli_affected_rows($db);
    mysqli_close($db);
    echo "<p>Number of Affected Rows: $numberOfAffectedRows</p>";
    echo "<a href='PartB_Step1.php'>Back</a>";
}
?>