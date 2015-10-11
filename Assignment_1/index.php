<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>INET2005 - Assignment #1</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
<table>
    <th>emp_no</th>
    <th>birth_date</th>
    <th>first_name</th>
    <th>last_name</th>
    <th>gender</th>
    <th>hire_date</th>
    <?php
    require_once 'php/dbConn.php';
    $db = connect('employees');

    if (!isset($_GET['page'])) {
        $page = 0;
    } else {
        $page = $_GET['page'];
    }

    $prevPage = 0;
    $nextPage = 0;
    $name = "";

    if ($page - 25 >= 0) {
        $prevPage = $page - 25;
        $nextPage = $page + 25;
    } else {
        $prevPage = 0;
        $nextPage = 25;
    }

    if (!isset($_GET['name'])) {
        $result = mysqli_query($db, "SELECT * FROM employees LIMIT $page,25");
        if (!$result) {
            die ("Could not select record(s) from the Employees Database: " . mysqli_error($db));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['emp_no'] . "</td>";
            echo "<td>" . $row['birth_date'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['hire_date'] . "</td>";
            echo "<td><form action='php/update.php' method='post'>
            <input type='image' src='img/edit32.png' name='idToUpdate' value=" . $row['emp_no'] . "></form>";
            echo "<td><form action='php/delete.php' method='post'>
            <input type='image' src='img/delete32.png' name='idToDelete' value=" . $row['emp_no'] . "></form>";
            echo "</tr>";
        }
    } else {
        $name = $_GET['name'];
        $result = mysqli_query($db, "SELECT * FROM employees WHERE first_name LIKE '%$name%'
                  OR last_name LIKE '%$name%' LIMIT $page, 25");
        if (!$result) {
            die ("Could not select record(s) from the Employees Database: " . mysqli_error($db));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['emp_no'] . "</td>";
            echo "<td>" . $row['birth_date'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['hire_date'] . "</td>";
            echo "<td><form action='php/update.php' method='post'>
            <input type='image' src='img/edit32.png' name='idToUpdate' value=" . $row['emp_no'] . "></form>";
            echo "<td><form action='php/delete.php' method='post'>
            <input type='image' src='img/delete32.png' name='idToDelete' value=" . $row['emp_no'] . "></form>";
            echo "</tr>";
        }
    }
    disconnect($db);
    ?>
</table>
<section>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get" name="searchEmployee" autocomplete="off">
        <label>Search Employee First Name or Last Name</label><br/>
        <label>Search: <input type="text" name="name" value="<?= $name ?>"><input name="" type="submit" value="Submit Query"></label>
    </form>
    <br/>
    <a href="index.php?page=<?= $prevPage ?>&name=<?= $name ?>">Prev</a>
    <a href="index.php?page=<?= $nextPage ?>&name=<?= $name ?>">Next</a>
    <br/><br/>
    <a href="insertEmployee.html">Insert a new employee</a>
</section>
</body>
</html>