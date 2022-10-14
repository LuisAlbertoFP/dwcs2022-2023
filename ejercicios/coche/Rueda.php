<?php
class Rueda {
    private $estado;

    function  __construct($inflada=false)
    {
        $this->estado = $inflada;
    }

    function inflar() {
        $this->estado = true;
    }

    function desinflar() {
        $this->estado = false;
    }
}