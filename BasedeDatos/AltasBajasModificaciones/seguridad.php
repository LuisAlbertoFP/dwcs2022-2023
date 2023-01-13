<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
}