<?php
class Ventana {
    private $estado;

    function  __construct($abierta=false)
    {
        $this->estado = $abierta;
    }

    function abrir() {
        $this->estado = true;
    }

    function cerrar() {
        $this->estado = false;
    }
}