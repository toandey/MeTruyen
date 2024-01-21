<?php
session_start();
function isUserLoggedIn() {
    return isset($_SESSION['user']);
}

function checkLoginStatus() {
    if (!isUserLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

function getCurrentUser() {
    return isUserLoggedIn() ? $_SESSION['user'] : null;
}

function logoutUser() {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

checkLoginStatus();
?>
