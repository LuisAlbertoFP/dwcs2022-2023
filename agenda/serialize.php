<?php
require_once("modelo/evento.php");
$e = new Evento("1","0","test",new DateTime(),new DateTime());
$array = [$e,$e];
echo "<pre>";
$ser = serialize($array);
print_r($ser);
print_r(unserialize($ser));
echo "</pre>";