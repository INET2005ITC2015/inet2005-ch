<?php
session_start();
ob_start();

require_once 'dbConn.php';
$db = connect('employees');

$username = "";
$password = "";

$username = $_POST['userName'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);
$sql = "SELECT * FROM users WHERE user_name='$username' and password= PASSWORD('$password')";
$result = mysqli_query($db, $sql);

$count = mysqli_num_rows($result);

if ($count == 1) {
    $_SESSION['userName'] = $username;
    $_SESSION['password'] = $password;
    header("location:loginSuccess.php");
} else {
    echo "Wrong Username or Password";
}

ob_end_flush();

?>