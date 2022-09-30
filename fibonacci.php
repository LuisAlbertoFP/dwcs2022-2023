<?php

function fibonacci($num){
    $resultado = 0;
    if ($num < 2) {
        $resultado = $num;
    } else {
        $resultado = fibonacci(($num-1)) + fibonacci(($num-2));
    }
    return $resultado;
}

function fibonacciI($num) {
    $resultados = [0,1];
    for($i=2;$i<=$num;$i++){
        $resultados[$i] = $resultados[($i-1)]+$resultados[($i-2)];
    }
    return $resultados[$num];
}
echo "Recursivo: ".fibonacci(10)."\n";
echo "Iterativo: ".fibonacciI(10)."\n";