<?php
define("CLAVE","asdfjn.-ms#rhj3DF");
const CLAVE2 = "asdfjn.-ms#rhj3DF";
session_start();
$minimo = 1;
$maximo = 100;
$historico = [];
$numPartidas = 0;

function nuevaPartida(&$secreto,&$intentos,&$historico) {
    $secreto = random_int(1,100);
    $_SESSION["secreto"]= $secreto;
    $intentos = 0;
    $_SESSION["intentos"]= $intentos;
    $_SESSION["historico"]= [];
    $historico = $_SESSION["historico"];
}

function recuperarDatosPartida(&$secreto,&$intentos,&$historico,&$numPartidas) {
    $secreto = $_SESSION["secreto"];
    $intentos = $_SESSION["intentos"];
    $historico = $_SESSION["historico"];
    RecuperarPartidasJugadas($numPartidas);
}

function actualizarIntentos(&$intentos) {
    $intentos++;
    $_SESSION["intentos"]= $intentos;
}

function guardarHistorico($numero) {
    $_SESSION["historico"][]= $numero;
    return $_SESSION["historico"];
}

function ActualizarPartidasJugadas(&$numPartidas){
    $numPartidas++;
    setcookie("numPartidas",$numPartidas,time()+3600000);
    setcookie("hash_numPartidas",hash("sha1",($numPartidas.CLAVE)),time()+3600000);
}

function RecuperarPartidasJugadas(&$numPartidas){
    if (isset($_COOKIE["numPartidas"]) && isset($_COOKIE["hash_numPartidas"])) {
        $numPartidas =  $_COOKIE["numPartidas"];
        $hash= hash("sha1",($numPartidas.CLAVE));
        if ($hash!=$_COOKIE["hash_numPartidas"]) {
            $numPartidas = -1; 
            ActualizarPartidasJugadas($numPartidas); 
        }
    } else {
        $numPartidas = -1; 
        ActualizarPartidasJugadas($numPartidas); 
    }
}

if (!isset($_SESSION["secreto"]) || !isset($_SESSION["intentos"])) {
    nuevaPartida($secreto,$intentos);
} else {
    recuperarDatosPartida($secreto,$intentos,$historico,$numPartidas);
}


if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["numero"])) {
    $numero =  $_POST["numero"];
    //Controlar intentos
    actualizarIntentos($intentos);
    $historico = guardarHistorico($numero);
    if ($intentos >= 5) {
        $mensaje = "Ha superado el número de intentos, el número era: ".$secreto;    
        ActualizarPartidasJugadas($numPartidas);
        nuevaPartida($secreto,$intentos,$historico);
    } else {
        //Menor
        if($numero  < $secreto) {
            $mensaje = "El número es mayor que: ".$numero ;
        }
        //Mayor
        if($numero  > $secreto) {
            $mensaje = "El número es menor que: ".$numero ;
        }
        //Igual
        if($numero  == $secreto) {
            $mensaje = "Has acertado el número era: ".$numero ;
            nuevaPartida($secreto,$intentos,$historico);
            ActualizarPartidasJugadas($numPartidas);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sesiones</h1>
    <p>Numero de intentos: <?=$intentos?></p>
    <p><?=(isset($mensaje))?$mensaje:""    ?></p>
    <p>Historico: <?=implode(", ",$historico) ?></p>
    <form action="" method="post">
        <label for="numero">número</label>
        <input type="number" name="numero" min="<?=$minimo?>" max="<?=$maximo?>" id="numero">
        <input type="submit" value="Comprobar">
    </form>
    <p>Partidas Jugadas: <?=$numPartidas ?></p>
    <?=$secreto?>
</body>
</html>