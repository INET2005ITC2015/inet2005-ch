<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Part B - Step #1</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once('dbConnection.php');
    $db = connectToSakila();
    if (!is_null($_POST['firstName']) && !is_null($_POST['lastName'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];

        $result = mysqli_query($db, "INSERT INTO actor (first_name, last_name)
        VALUES ('" . $firstName . "', '" . $lastName . "')");

        if (!$result) {
            die ("Could not insert record into the Sakila Database: " . mysqli_error($db));
        } else {
            echo "Actor Inserted";
        }
    }

    $result = mysqli_query($db, "SELECT * FROM actor ORDER BY actor_id DESC LIMIT 10");
    if (!$result) {
        die("Could not retrieve records from the Sakila Databse: " . mysqli_error($db));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['actor_id'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td></tr>";
    }

    disconnect($db);
    $_POST['firstName'] = null;
    $_POST['lastName'] = null;

    ?>
    </tbody>
</table>
<form action="PartB_Step4.php" method="post">
    <p>ID to Delete: <input name="idToDelete" type="text"></p>
    <input name="" type="submit">
</form>
<form action="PartB_Step5.php" method="post">
    <p>ID to Update: <input name="idToUpdate" type="text"></p>
    <input name="" type="submit">
</form>
</body>
</html>