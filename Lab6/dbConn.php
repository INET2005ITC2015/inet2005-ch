<?php

$dbConnection;
$result;

function connectToDB()
{
    global $dbConnection;
    $dbConnection = mysqli_connect("localhost", "root", "inet2005", "employees");
    if (!$dbConnection) {
        die('Could not connect to the Employees Database: ' .
            mysqli_error($dbConnection));
    }
}

function closeDB()
{
    global $dbConnection;
    mysqli_close($dbConnection);
}

function selectEmployeesWithNameLike($searchString)
{
    global $dbConnection;
    global $result;
    $sqlStatement = "SELECT * FROM employees WHERE first_name LIKE '";
    $sqlStatement .= $searchString;
    $sqlStatement .= "%' ";
    $sqlStatement .= "OR last_name LIKE '";
    $sqlStatement .= $searchString;
    $sqlStatement .= "%';";
    $result = mysqli_query($dbConnection, $sqlStatement);
    if (!$result) {
        die('Could not retrieve records from the Employees Database: ' .
            mysqli_error($dbConnection));
    }

}

function fetchRows()
{
    global $dbConnection;
    global $result;
    if (!$result) {
        die('No records in the result set: ' .
            mysqli_error($dbConnection));
    }
    return mysqli_fetch_assoc($result);
}