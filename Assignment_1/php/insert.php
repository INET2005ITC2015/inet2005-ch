<?php

require_once 'dbConn.php';
$db = connect('employees');

function getLastEmpNo($db) {
    $result = mysqli_query($db, "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 1");
    $selectedRow = mysqli_fetch_assoc($result);
    $newEmpNumber = $selectedRow['emp_no'] + 1;
    return $newEmpNumber;
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$gender = $_POST['gender'];
$birthDate = $_POST['birthDate'];
$hireDate = $_POST['hireDate'];
$empNo = getLastEmpNo($db);

$result = mysqli_query($db, "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
                             VALUES ('" . $empNo . "', '" . $birthDate . "', '" . $fName . "',
                             '" . $lName . "', '" . $gender . "', '" . $hireDate . "')");

if (!$result) {
    die ("Could not insert record into the Employees Database: " . mysqli_error($db));
} else {
    echo "Employee Inserted";
}

echo "<a href='index.php'>Back to index</a>";
echo "<a href='insertEmployee.html'>Insert another employee</a>";

disconnect($db);
