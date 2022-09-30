<?php
$arr = [10,20,['2',3,7,8],40];
foreach($arr as $datos) {
    if (is_array($datos)) {
        foreach($datos as $elemento) {
            echo $elemento."\n";
        }
    }
    else {
        echo $datos."\n";
    }
}

