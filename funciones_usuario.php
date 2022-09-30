<?php
function suma($a,$b) {
    return $a+$b;
}
echo suma(5,"3");

function persona($nombre,$apellido1="1",$apellido2="2") {
    echo "$apellido1 $apellido2, $nombre\n";
}
/*
//No se puede
function persona($nombre) {
    echo "$nombre\n";
}
*/
persona("Juan","López","López");
persona("Juan","López",NULL);
persona("Juan");

//PASO POR VALOR
function incrementar1($valor){
     $valor++;
     return $valor++;
}
//paso por referencia
function incrementar2(&$valor){
    $valor++;
    return $valor++;
}
$a=4;
echo incrementar1($a)." - $a\n";
echo incrementar2($a)." - $a\n";