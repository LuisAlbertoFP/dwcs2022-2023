<?php
$nodef= "";
echo "\nEs nula: ".is_null($nodef);
echo "\nDefinida: ".isset($nodef);
echo "\nVacia: ".empty($nodef);
$arr = [10,20,['2',3,7,8],40];
print_r($arr);
var_dump($arr);
