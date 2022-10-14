<?php
require_once("Ventana.php");
class Puerta {
    private $estado;
    private $ventana;

    function  __construct($abierta=false)
    {
        $this->estado = $abierta;
        $this->ventana = new Ventana();
    }

    function abrir() {
        $this->estado = true;
    }

    function cerrar() {
        $this->estado = false;
    }
    function getVentana() {
        return $this->ventana;
    }
}

/*
$puerta = new Puerta();
var_dump($puerta);
$puerta->getVentana()->abrir();
echo "------------\n";
var_dump($puerta);
*/