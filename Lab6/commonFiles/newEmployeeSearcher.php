<?php

$searchValue = "";

if (!empty($_GET['q'])) {
    $searchValue = $_GET['q'];

    include("dbConn.php");

    connectToDB();

    selectEmployeesWithNameLike($searchValue);


    while ($row = fetchRows()) {
        echo $row['first_name'] . $row['last_name'] . "<br/>";
    }

    closeDB();
}
