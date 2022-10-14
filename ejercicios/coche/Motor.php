<?php
class Motor {
    private $estado;

    function __construct($encendio=false)
    {
        $this->estado = $encendio;
    }

    function arrancar() {
        $this->estado = true;
    }

    function apagar() {
        $this->estado = false;
    }
    
}