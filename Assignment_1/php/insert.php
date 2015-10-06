<?php

require_once 'dbConn.php';
$db = connect();
$result = mysqli_query($db, "SELECT * FROM employees LIMIT 0,25");

if (!$result) {
    die ("Could not select record(s) from the Employees Database: " . mysqli_error($db));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row['emp_no'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td></tr>";
}
