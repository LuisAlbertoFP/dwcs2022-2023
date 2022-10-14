<?php
require_once("Coche.php");

$coche = new Coche();
var_dump($coche);
$coche->getPuerta(0)->abrir();
$coche->getRueda(2)->inflar();
var_dump($coche->getRueda(2));