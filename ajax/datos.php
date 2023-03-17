<?php
session_start();

if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["nombre"])&& isset($_POST["apellidos"])) {
   echo json_encode(["nombre"=>$_POST["nombre"],"apellidos"=>$_POST["apellidos"]]);
} else {
 //   //header('HTTP/1.0 403 Forbidden');
   // exit();
}

//if ($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET["nombre"])&& isset($_GET["apellidos"])) {
    echo json_encode(["nombre"=>$_SESSION["nombre"],"apellidos"=>"sdfasf"]);
// }