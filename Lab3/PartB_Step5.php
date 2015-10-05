<?php
if (isset($_POST['idToUpdate'])) {
    $id = $_POST['idToUpdate'];
    require_once 'dbConnection.php';
    $db = connectToSakila();
    if (!$db) {
        die ("Could not connect to Sakila Database" . mysqli_error($db));
    }
    $result = mysqli_query($db, "SELECT * FROM actor WHERE actor_id = $id");
    if (!$result) {
        die ("Could not retieve records from Saklia " . mysqli_error($db));
    }
    $selectedRecord = mysqli_fetch_assoc($result);
    mysqli_close($db);
}
?>
<form action="PartB_Step5Update.php" method="post">
    <input type="hidden" name="idToUpdate" value="<?php echo $id ?>">
    <p>First Name: <input name="fName" type="text" value="<?php echo $selectedRecord['first_name'] ?>"></p>
    <p>Last Name: <input name="lName" type="text" value="<?php echo $selectedRecord['last_name'] ?>"></p>
    <input name="submitUpdate" type="submit" value="Update">
</form>