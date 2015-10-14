<?php

function checkLogin() {
    session_start();
    if ((empty($_SESSION['userName']) || (empty($_SESSION['password'])))) {
        header("location: ../index.html");
    }
}

?>