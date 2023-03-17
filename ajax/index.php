<?php
session_start();
$_SESSION["privado"] = true;
$_SESSION["nombre"] = "Arturo";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="funciones.js"></script>
    <title>Ajax ejemplo</title>
</head>
<body>
    <h1>Ejemplo Ajax</h1>
    <button onclick="peticionServidor()">Hola</button>
    <div id="contendor"></div>
</body>
</html>