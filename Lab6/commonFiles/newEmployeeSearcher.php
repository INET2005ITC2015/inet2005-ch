<?php

$searchValue = "";

if (!empty($_GET['q'])) {
    $searchValue = $_GET['q'];

    include("dbConn.php");

    connectToDB();

    selectEmployeesWithNameLike($searchValue);


    while ($row = fetchRows()) {
        $tooltipText = "Employee ID: {$row['emp_no']}\nHire Date: {$row['hire_date']}";
        echo "<p class='tooltip' title='{$tooltipText}'>{$row['first_name']} {$row['last_name']}</p>";
    }

    closeDB();
}
