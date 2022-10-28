<?php
$contador2 = 0;
$contador2++;
session_start();
if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 0;
} else {
    $_SESSION["contador"]++;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>

</head>
<body>
   <p>Sin sesion: <?=$contador2?> veces </p>
    <p>Esta página se ha cargado <?=$_SESSION["contador"]?> veces </p> 
</body>
</html>