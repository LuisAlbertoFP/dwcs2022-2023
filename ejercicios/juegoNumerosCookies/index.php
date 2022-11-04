<?php
$minimo = 1;
$maximo = 100;

function nuevaPartida(&$secreto,&$intentos) {
    $secreto = random_int(1,100);
    setcookie("secreto",$secreto,time()+3600);
    $intentos = 0;
    setcookie("intentos",$intentos,time()+3600);
}

function recuperarDatosPartida(&$secreto,&$intentos) {
    $secreto = $_COOKIE["secreto"];
    $intentos = $_COOKIE["intentos"];
}

function actualizarIntentos(&$intentos) {
    $intentos++;
    setcookie("intentos",$intentos,time()+3600);
}

if (!isset($_COOKIE["secreto"]) || !isset($_COOKIE["intentos"])) {
    nuevaPartida($secreto,$intentos);
} else {
    recuperarDatosPartida($secreto,$intentos);
}

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["numero"])) {
    $numero =  $_POST["numero"];
    //Controlar intentos
    actualizarIntentos($intentos);
    if ($intentos >= 5) {
        $mensaje = "Ha superado el número de intentos, el número era: ".$secreto;    
        nuevaPartida($secreto,$intentos);
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
            nuevaPartida($secreto,$intentos);
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
    <h1>Cookies</h1>
    <p>Numero de intentos: <?=$intentos?></p>
    <p><?=(isset($mensaje))?$mensaje:""    ?></p>
    <form action="" method="post">
        <label for="numero">número</label>
        <input type="number" name="numero" min="<?=$minimo?>" max="<?=$maximo?>" id="numero">
        <input type="submit" value="Comprobar">
    </form>
    <?=$secreto?>
</body>
</html>