<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>INET2005 - Assignment #1</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <script src="../js/jquery-2.1.4.js"></script>
    <script src="../js/updateScript.js"></script>
</head>
<body>
<?php
if (!is_null($_POST['idToUpdate'])) {
    $id = $_POST['idToUpdate'];
    require_once 'dbConn.php';
    $db = connect('employees');
    if (!$db) {
        die ("Could not connect to Employees Database" . mysqli_error($db));
    }
    $result = mysqli_query($db, "SELECT * FROM employees WHERE emp_no = $id");
    if (!$result) {
        die ("Could not retrieve records from Employees " . mysqli_error($db));
    }
    $record = mysqli_fetch_assoc($result);
    disconnect($db);
}
?>
<form id="updateEmployee" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="updateEmpForm" autocomplete="off">
    <label class="inputLabel" for="fName">First Name: </label>
    <input id="fName" name="fName" type="text" value="<?= $record['first_name'] ?>" required><br/>
    <label class="inputLabel" for="lName">Last Name: </label>
    <input id="lName" name="lName" type="text" value="<?= $record['last_name'] ?>" required><br/>
    <label class="inputLabel">Gender: </label>
    <input id="male" name="gender" type="radio" value="M" <?php if($record['gender'] == "M") {echo "checked";} ?>>
    <label for="male">Male</label>
    <input id="female" name="gender" type="radio" value="F" <?php if($record['gender'] == "F") {echo "checked";} ?>>
    <label for="female">Female</label><br/>
    <label class="inputLabel" for="birthDate">Birth Date (YYYY-MM-DD): </label>
    <input id="birthDate" type="text" name="birthDate" value="<?= $record['birth_date'] ?>" required><br/>
    <label class="inputLabel" for="hireDate">Hire Date (YYYY-MM-DD): </label>
    <input id="hireDate" type="text" name="hireDate" value="<?= $record['hire_date'] ?>" required><br/>
    <input type="hidden" name="idToUpdate" value="<?= $record['emp_no'] ?>">
    <input name="" type="submit" value="Update Employee">
</form>
<?php
if (!is_null($_POST['fName']) && !is_null($_POST['lName']) && !is_null($_POST['hireDate']) &&
!is_null($_POST['gender']) && !is_null($_POST['birthDate']) && !is_null($_POST['idToUpdate'])) {

    require_once 'dbConn.php';
    $db = connect('employees');

    $id = $_POST['idToUpdate'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $gender = $_POST['gender'];
    $hireDate = $_POST['hireDate'];
    $birthDate = $_POST['birthDate'];

    $result = mysqli_query($db, "UPDATE employees SET first_name='$fName', last_name='$lName', gender='$gender',
              hire_date='$hireDate', birth_date='$birthDate' WHERE emp_no = $id");
    if (!$result) {
        die ("Could not update records from Employees " . mysqli_error($db));
    }
    $numberOfAffectedRows = mysqli_affected_rows($db);
    disconnect($db);
    if($numberOfAffectedRows > 0) {
        echo "<h5>Number of Affected Rows: " . $numberOfAffectedRows . "</h5>";
    }
}
?>
<a href="../index.php">Back to Index</a>
</body>
</html>