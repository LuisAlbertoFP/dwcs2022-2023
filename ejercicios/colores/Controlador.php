<?php
class Controlador {
    private $tablero;
    public function __construct()
    {   
        //TODO
        //Recuparar datos sesion 
        session_start();
        if (isset($_SESSION["tablero"])) {

        }  else {
           // $tablero = new Tablero();
        }
    }

    public function guardarEstado() {
        $_SESSION["tablero"] = $this->tablero;
    }

    public function jugar($fila) {

    }

    public function dibujarInterfaz() {

    }
}