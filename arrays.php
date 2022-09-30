<?php
//$mi_array = [0=>"Hola",10=>"Adios"];
$mi_array = ["Hola",10=>"Juan","Adios"];
$mi_array["A"]="raroraro";
$mi_array[]="final";
print_r($mi_array);

$mi_array2 = ["Hola","Adios"];
for($i=0;$i<=count($mi_array2)-1;$i++){
    echo "Elemento $i valor: ".$mi_array2[$i]."\n";
}

$datos = ["nombre"=>"Juan","apellido"=>"perez"];
foreach($datos as $valor) {
//foreach($datos as $clave => $valor) {
 //echo "$clave:$valor\n";
 echo "$valor\n";
}

$a1 = [10,20,30,40];
print_r($a1);
echo "\n";
$a1[]=5;
print_r($a1);
echo "\n";
$a1[10]=6;
$a1[]=5;
print_r($a1);
echo "\n";



$datos2 = ["nombre"=>"Juan","apellido"=>["perez","lopez"]];
print_r(array_values($datos2));
echo "\n".count($datos2);
