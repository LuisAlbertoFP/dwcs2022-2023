<?php
  require_once("alumno.php");
  include_once("componentes/datos_buffer.php");
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    try {
        $alumno_array["nombre"] = $_POST["nombre"];
        $alumno_array["apellidos"] = $_POST["apellidos"];
        $alumno_array["nif"] = $_POST["nif"];
        $alumno_array["sexo"] = $_POST["sexo"];
        //forma correcta
        //$alumno = new alumno($_POST["nombre"],$_POST["apellidos"],$_POST["nif"],$_POST["sexo"]);
        $alumno = new alumno(...$alumno_array);
    }catch (Exception $e) {
        unset($alumno);
        $error = $e->getMessage();
    }
    

  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario alumno</title>
</head>
<body>

   <?php 
        if (isset($error)) { ?>
              <div class="error"><?=$error ?></div>
        <?php }
        if (isset($alumno)) {
          echo datosAlumno($alumno);
        } 
        include_once("componentes/formulario.php"); 
   ?>
</body>
</html>
