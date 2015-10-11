<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>INET2005 - Assignment #1</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
<h5>To remove employee record #<?= $_POST['idToDelete'] ?></h5>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
    <label for="confirm">Type 'delete' in the box to remove the record</label>
    <input type="text" id="confirm" name="delConfirm" required>
    <input type="hidden" name="id" value="<?= $_POST['idToDelete'] ?>">
    <input type="submit" value="Delete Record">
</form>
<?php
if($_POST['delConfirm'] == "delete") {
    require_once 'dbConn.php';
    $db = connect('employees');
    $id = $_POST['id'];
    mysqli_query($db, "DELETE FROM employees WHERE emp_no = $id");
    $affectedRows = mysqli_affected_rows($db);
    disconnect($db);
    echo "<h5>Number of Affected Rows: " . $affectedRows . "</h5>";
}
?>
<a href="../index.php">Back to Index</a>
</body>
</html>