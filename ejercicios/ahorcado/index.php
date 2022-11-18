<?php


//Variables
//Crea la constante PALABRA con el array "suerte","GANAR","perder","aprobar"
const PALABRAS = ["suerte","GANAR","perder","aprobar"];
$palabra = "APROBAR";
$palabra_oculta = "______"; //Tantos guiones como letras tiene $palabra
$letras = [];  // Letras jugadas por el jugador en la partida actual
$vidas = 7; //Vidas de las que dispone el jugador para adivinar la $palabra
$mensaje = null;  //Mensajes a mostrar el jugador: letra repetida, ha gando, ha perdido, ...
$partidas_jugadas = 0;  //Partidas totales jugadas por el jugador
$partidas_ganadas = 0; //Partidas ganadas por el jugador

//Código que necesites incluir y no este definido  -->
session_start();
//-------

//Funciones necesarias para desarrollar el juego
/**
 * posiscionesLetra
 * Función que devuelve las posiciones de la "letra" enviada en la palabra a adivinar
 *
 * @param  mixed $palabra palabra que se ha de acertar
 * @param  mixed $letra letra enviada por el jugador
 * @return mixed Devuelve "false" si no se encuentra la letra en la palabra,
 *               en otro caso devuelve un "array" con las posiciones de esta
 */
function posiscionesLetra($palabra,$letra) {
    $offset = 0;
    $allpos = array();
    while (($pos = strpos($palabra, $letra, $offset)) !== FALSE) {
        $offset   = $pos + 1;
        $allpos[] = $pos;
    }
    if (count($allpos)==0) {
        $allpos = false;
    }
    return $allpos;
}
//
/**
 * colocarletras
 *  Función que coloca la letra en sus posiciones en la palabra oculta
 *      ej:)    palabra a adivinar "SOL" letra= "O" palabra_oculta="___" return "_O_"
 * @param  mixed $palabra_oculta  palabra que contiene guiones y que serán sustituidos en esta función
 * @param  mixed $posiciones posiciones donde se encuentra la letra en la palabra a adivinar
 * @param  mixed $letra letra a colocar en la palabra
 * @return string palabra oculta con la letra en sus posiciones  
 */
function colocarletras($palabra_oculta,$posiciones,$letra){
        foreach($posiciones as $pos) {
            $palabra_oculta[$pos]=$letra;
        }
        return $palabra_oculta;
}

/**
 * cargarestadojuego
 *  Carga los datos del juego necesarios de la anterior jugada
 *
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @param  mixed $partidas_jugadas número de partidas jugadas por el jugador
 * @param  mixed $partidas_ganadas número de partidas ganadas por el jugador
 * @return void
 */
function cargarestadojuego(&$palabra,&$palabra_oculta,&$letras,&$vidas,&$partidas_jugadas,&$partidas_ganadas) {
    if (!isset($_SESSION["palabra"])) {
        inciarjuego($palabra,$palabra_oculta,$letras,$vidas);
    } else {
    $palabra = $_SESSION["palabra"] ;
    $palabra_oculta = $_SESSION["palabra_oculta"] ;
    $letras = $_SESSION["letras"] ;
    $vidas = $_SESSION["vidas"] ;
    if (isset($_COOKIE["partidas_jugadas"]) && isset($_COOKIE["partidas_ganadas"])) {
        $partidas_jugadas = $_COOKIE["partidas_jugadas"];
        $partidas_ganadas = $_COOKIE["partidas_ganadas"];
    }
    }
}

/**
 * inciarjuego
 * 
 * obtiene la $palabra al azar del array PALABRAS
 * crea la palabra_oculta a partir de la palabra generada al azar
 * inicializa el array de $letras jugadas en la partida
 * inicializa el numero de $vidas a 7
 * 
 * En caso de ganar o perder una partida actualiza el número de partidas jugadas y ganadas
 * los parametros $ganar, $partidas_jugadas y $partidas_ganadas son opcionales, en caso de no ser
 * necesarios su valor por defecto será null
 *
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @param  mixed $ganar [default null] Permite indicar si se ha ganado o perdio una partida (true, false)
 * @param  mixed $partidas_jugadas [default null] número de partidas jugadas por el jugador
 * @param  mixed $partidas_ganadas [default null] número de partidas ganadas por el jugador
 * @return void
 */
function inciarjuego(&$palabra,&$palabra_oculta,&$letras,&$vidas,$ganar=null,&$partidas_jugadas=null,&$partidas_ganadas=null) {
   $palabra = strtoupper(PALABRAS[random_int(0,(count(PALABRAS)-1))]);
   $palabra_oculta = str_repeat("_",strlen($palabra));
   $letras = [];
   $vidas = 7;
   if (!is_null($ganar)) {
        if ($ganar) {
            setcookie("partidas_ganadas",++$partidas_ganadas,time()+3600);
        } 
        setcookie("partidas_jugadas",++$partidas_jugadas,time()+3600);
   }
   
}

/**
 * guardarestadojuego
 * 
 * Guarda el estado de la partida para que se pueda continuar el juego en la próxima llamada a la página
 *
 * @param  mixed $palabra palabra a adivinar por el jugador
 * @param  mixed $palabra_oculta  palabra con la longitud de la $palabra que contiene _ en lugar de las letras
 * @param  mixed $letras letras jugadas por el jugador en la partida actual
 * @param  mixed $vidas vidas que le restan al jugador en la partida actual
 * @return void
 */

function guardarestadojuego($palabra,$palabra_oculta,$letras,$vidas) {
   $_SESSION["palabra"] = $palabra;
   $_SESSION["palabra_oculta"] = $palabra_oculta;
   $_SESSION["letras"] = $letras;
   $_SESSION["vidas"] = $vidas;
}


//Control del juego
/*
Utiliza aquí las funciones creadas anteriormente y haz que el juego funcione
*/
cargarestadojuego($palabra,$palabra_oculta,$letras,$vidas,$partidas_jugadas,$partidas_ganadas);

if ($_SERVER["REQUEST_METHOD"]="POST" && isset($_POST['letra']) && $_POST['letra'] != ""  ) {
    $letra = strtoupper($_POST['letra']);
    if (in_array($letra,$letras)) {
        $mensaje = "letra ya jugada: $letra";
    }

    $posiciones = posiscionesLetra($palabra,$letra);
    if ($posiciones){
        $palabra_oculta = colocarletras($palabra_oculta,$posiciones,$letra);

        if ($palabra_oculta == $palabra) {
            $mensaje = "Has ganado";
            inciarjuego($palabra,$palabra_oculta,$letras,$vidas,true,$partidas_jugadas,$partidas_ganadas);
        } else {
            if (!in_array($letra,$letras)) {
              $letras[] = $letra;
            }
        }

    } else {
        if (!in_array($letra,$letras)) {
          $vidas--;
          $letras[] = $letra;
        } 
    }
    if ($vidas < 1) {
        $mensaje = "Has perdido, la palabra era: $palabra ";
        inciarjuego($palabra,$palabra_oculta,$letras,$vidas,false,$partidas_jugadas,$partidas_ganadas);
    } 
    
    
}
guardarestadojuego($palabra,$palabra_oculta,$letras,$vidas);
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
    <div>Mesajes: <?=(!is_null($mensaje)?$mensaje:"")?> </div>
    <div>Letras jugadas: <?=implode(", ",$letras)?></div>
    <div>Palabra: <?=$palabra_oculta?>  Longitud: <?=strlen($palabra_oculta)?></div>
    <div>Vidas: <?=$vidas?></div>
    <form action="" method="post">
        <input type="text" name="letra" id="letra">
        <input type="submit" value="Comprobar">
    </form>
    <div>Partidas ganadas: <?=$partidas_ganadas?>  / Partidas jugadas: <?=$partidas_jugadas?></div>
    <div>Palabra: <?=$palabra?></div>
</body>
</html>