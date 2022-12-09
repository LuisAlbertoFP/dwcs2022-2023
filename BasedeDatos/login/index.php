<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
} else {
    include("privado.php");
    //header("location:privado.php");
    //exit();
}
?>