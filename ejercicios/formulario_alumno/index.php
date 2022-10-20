<?php
  
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    require_once("../ejercicioDNI/NIF.php");

    try {
        $alumno["nombre"] = $_POST["nombre"];
        $alumno["apellidos"] = $_POST["apellidos"];
        $alumno["nif"] = new NIF($_POST["nif"]);
        $alumno["sexo"] = $_POST["sexo"];
    }catch (Exception $e) {
        unset($alumno);
        echo "hay un error";
    }
    

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario alumno</title>
</head>
<body>
   <?php 
        if (isset($alumno)) {
            print_r($alumno);
        } 
        include_once("componentes/formulario.php"); 
   ?>
</body>
</html>