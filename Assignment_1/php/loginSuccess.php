<?php
session_start();
if(!isset($_SESSION['userName'])){
    header("location:../index.html");
} else {
    header("location:../main.php");
}
?>