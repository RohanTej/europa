<?php
session_start();

if (isset($_SESSION['uid'])) {
    unset($_SESSION['uid']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['access']);
    unset($_SESSION['log']);
}

session_unset();
session_destroy();
header("Location: index");
?>