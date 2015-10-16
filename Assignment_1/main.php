<?php
require 'php/loginSession.php';
checkLogin();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>INET2005 - Assignment #1</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
<a href="php/logout.php">Logout</a>
<table>
    <th><a href="<?= getSortLink('emp_no') ?>">emp_no</a></th>
    <th><a href="<?= getSortLink('birth_date') ?>">birth_date</a></th>
    <th><a href="<?= getSortLink('first_name') ?>">first_name</a></th>
    <th><a href="<?= getSortLink('last_name') ?>">last_name</a></th>
    <th><a href="<?= getSortLink('gender') ?>">gender</a></th>
    <th><a href="<?= getSortLink('hire_date') ?>">hire_date</a></th>
    <?php

    function getSortLink($sort) {
        $_GET['direction'] = getSortDirection();
        $url = "main.php";
        if(isset($_GET['page']) && isset($_GET['name'])) {
            $url .= "?page=" . $_GET['page'] . "&name=" . $_GET['name'] . "&sort=" . $sort . "&direction=" . $_GET['direction'];
        } else if (isset($_GET['page'])) {
            $url .= "?page=" . $_GET['page'] . "&sort=" . $sort . "&direction=" . $_GET['direction'];
        } else if (isset($_GET['name'])) {
            $url .= "?name=" . $_GET['name'] . "&sort=" . $sort . "&direction=" . $_GET['direction'];
        } else {
            $url .= "?sort=" . $sort . "&direction=" . $_GET['direction'];
        }
        return $url;
    }

    function toggleDirection($current) {
        if ($current == "ASC") {
            $newDirection = "DESC";
        } else {
            $newDirection = "ASC";
        }
        return $newDirection;
    }

    function getSortDirection() {
        $currentDirection = $_GET['direction'];
        $newDirection = $_GET['direction'];
        if ($currentDirection == null) {
            $newDirection = "ASC";
//        } else if ($currentDirection == "ASC") {
//            $newDirection = "DESC";
//        } else if ($currentDirection == "DESC") {
//            $newDirection = "ASC";
//        }
        }
        return $newDirection;
    }

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

    $sort="";
    $oldSort;
    if ((isset($_GET['sort']) && (isset($_GET['direction'])))) {
        if ($oldSort == $_GET['sort']) {
            $_GET['direction'] = toggleDirection($_GET['direction']);
            $sort = " ORDER BY " . $_GET['sort'] . " " . $_GET['direction'];
        } else {
            $sort = " ORDER BY " . $_GET['sort'] . " " . $_GET['direction'];
        }
    }

    if (!isset($_GET['name'])) {
        $result = mysqli_query($db, "SELECT * FROM employees" . $sort . " LIMIT $page,25");
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
                  OR last_name LIKE '%$name%'" . $sort . " LIMIT $page, 25");
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
    <a href="main.php?page=<?= $prevPage ?>&name=<?= $name ?>">Prev</a>
    <a href="main.php?page=<?= $nextPage ?>&name=<?= $name ?>">Next</a>
    <br/><br/>
    <a href="insertEmployee.html">Insert a new employee</a>
</section>
</body>
</html>