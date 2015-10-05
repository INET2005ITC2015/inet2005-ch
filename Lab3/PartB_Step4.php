<?php
if (isset($_POST['idToDelete'])) {
    $idToDelete = $_POST['idToDelete'];
    require_once('dbConnection.php');
    $db = connectToSakila();
    mysqli_query($db, "DELETE FROM actor WHERE actor_id = '$idToDelete';");
    echo "Affected Rows: " . mysqli_affected_rows($db);
    echo "<br/>";
    echo "<a href='PartB_Step1.php'>Back</a>";
}