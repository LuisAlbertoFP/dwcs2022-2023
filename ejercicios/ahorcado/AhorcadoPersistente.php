<?php
require_once("Ahorcado.php");
class AhorcadoPersistente extends Ahorcado {

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION["ahorcado"])) {
            foreach($_SESSION["ahorcado"] as $clave => $valor){
                $this->$clave = $valor;
            }
        }
        if (isset($_COOKIE["partidas_jugadas"]) && isset($_COOKIE["partidas_ganadas"])) {
            $this->partidas_jugadas =$_COOKIE["partidas_jugadas"];
            $this->partidas_ganadas =$_COOKIE["partidas_ganadas"];
       }

    }


    public function guardar() {
        $datos["palabra"] = $this->palabra;
        $datos["palabra_oculta"] = $this->palabra_oculta;
        $datos["letras"] = $this->letras;
        $datos["vidas"] = $this->vidas;
        $_SESSION["ahorcado"] = $datos;
        setcookie("partidas_ganadas",$this->partidas_ganadas,time()+36000000);
        setcookie("partidas_jugadas",$this->partidas_jugadas,time()+36000000);
    }
}