<?php
require_once("AhorcadoPersistente.php");
session_start();
/* Serialización
$ahorcado = new Ahorcado();
if (isset($_SESSION["ahorcado"])) {
   //echo base64_decode($_SESSION["ahorcado"]);
   $ahorcado =unserialize(base64_decode($_SESSION["ahorcado"]));

}
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["letra"]) && $_POST["letra"] !="") { 
    $ahorcado->jugarLetra($_POST["letra"]);
}
$_SESSION["ahorcado"]  = base64_encode(serialize($ahorcado));
*/
$ahorcado = new AhorcadoPersistente();
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["letra"]) && $_POST["letra"] !="") { 
    $ahorcado->jugarLetra($_POST["letra"]);
}
$ahorcado->guardar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego ahorcado</title>
</head>
<body>
    <div>Mesajes: <?=$ahorcado->getMensaje()//Muestra aquí los mensajes si son necesaios ?> </div>
    <div>Letras jugadas: <?=(is_array($ahorcado->getLetras()))?implode(", ",$ahorcado->getLetras()):"" //Muestra aquí las letras juegadas por el jugador en la partida actual ?></div>
    <div>Palabra: <?=$ahorcado->getPalabra_oculta() //Muestra $palabra_oculta?>  Longitud: <?=strlen($ahorcado->getPalabra()) //indica la longitud de la palabra oculta?></div>
    <div>Vidas: <?=$ahorcado->getVidas() //muestra el número de $vidas que le restan al jugador en la partida actual?></div>
    <form action="" method="post">
        <input type="text" name="letra" id="letra">
        <input type="submit" value="Comprobar">
    </form>
    <div>Partidas ganadas: <?=$ahorcado->getPartidas_ganadas() //muestra $partidas_ganadas?>  / Partidas jugadas: <?=$ahorcado->getPartidas_jugadas() //muestra $partidas_jugadas?></div>
    <div>Palabra: <?=$ahorcado->getPalabra() //muestra la palabra a adivinar para ayudarte a dupurar el programa?></div>
</body>
</html>
