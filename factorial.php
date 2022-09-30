<?php
function factorialR($num){
    $resultado = -1;
    if ($num == 1) {
        $resultado = 1;
    } elseif ($num > 1 ) {
        $resultado = $num * factorialR($num-1);
    }
    return $resultado;
}
echo factorialR(6);