<?php
session_start();
$_SESSION["PHPBASE"] = str_replace("index.php","",$_SERVER["REQUEST_URI"]);
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
} else {
    include("privado.php");
}
?>