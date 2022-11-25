<?php
require_once("NumeroPersistencia.php");

$numero = new NumeroPersistencia();
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["intento"]) && $_POST["intento"] !="") { 
    $numero->jugarNumero($_POST["intento"]);
}
$numero->guardar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego Números</title>
</head>
<body>
    <div class="mensajes">
        <p><?= $numero->getMensaje(); ?></p>
        <p>Intentos: <?= $numero->getIntentos();?></p>
        <p>Numeros intentados: <?= $numero->getNumerosIntentados(); ?></p>
    </div>
    <form action="index.php" method="post">
        <input type="number" name="intento" id="intento" autofocus>
        <input type="submit" name="submit">
    </form>
    <p>Número a adivinar: <?=$numero->getValorNumero();?></p>
</body>
</html>