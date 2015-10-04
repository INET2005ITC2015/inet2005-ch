<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Part A - Step #2</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="searchDescription">
    <p>Search movie descriptions for: <input name="desc" type="text"></p>
    <input name="" type="submit" value="Submit Search">
</form>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_POST['desc'])) {
        $query = $_POST['desc'];

        $db = mysqli_connect("localhost", "root", "inet2005", "sakila");

        if (!$db) {
            die('Could not connect to the Sakila Database: ' . mysqli_errno($db));
        }

        $result = mysqli_query($db, "SELECT * FROM film WHERE description LIKE '%$query%'");
        if (!$result) {
            die("Could not retrieve records from the Sakila Databse: " . mysqli_error($db));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['title'] . "</td><td>" . $row['description'] . "</td></tr>";
        }

        mysqli_close($db);
    }
    ?>
    </tbody>
</table>
</body>
</html>