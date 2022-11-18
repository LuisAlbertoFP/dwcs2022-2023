<?php
require_once("Controlador.php");

$c = new Controlador();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $c->jugar($_POST["Fila"]);
}

$c->dibujarInterfaz();
$c->guardarEstado();
