<?php
function compruebaPosLetra($palabra, $letra) {
    $pos = array();
    $encontrado = true;
    $aux = -1;
   // for ($i=0; $i < strlen($palabra); $i++) {
        if (!strpos($palabra, $letra)) {
            $encontrado = false;
            return $encontrado;
        } else {
            $num = strpos($palabra, $letra);
            if ($aux != $num) {
                array_push($pos, $num);
                $aux = $num;
            }
        }
   // }
    return $pos;
 }

var_dump( compruebaPosLetra("SERPIENTE","E"));