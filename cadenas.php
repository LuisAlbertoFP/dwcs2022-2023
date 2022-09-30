<?php

$cadena = "a,b,c,d,e,f,g";
$arr = explode(",",$cadena);
var_dump($arr);
$cadena2 = implode(";",$arr);
var_dump($cadena2);
echo strstr($cadena2,"f");
$cadena3 = "López";
echo strtoupper($cadena3);
echo mb_strtoupper($cadena3);



echo "no funciona bien con acentos: ".strlen("niño");
echo mb_strlen("López");