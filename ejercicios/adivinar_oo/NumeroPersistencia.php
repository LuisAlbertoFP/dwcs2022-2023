<?php
require_once("Numero.php");
class NumeroPersistencia extends Numero{
    function __construct(){
        $this->load();
    }

    public function load(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        if(isset($_SESSION["Numero"])){
            $obj = unserialize(base64_decode($_SESSION["Numero"]));
            $this->copy($obj);
        }
        else{
            parent::iniciarJuego();
        }
    }
   
    public function copy($obj){
        $this->valorNumero = $obj->valorNumero;
        $this->intentos = $obj->intentos;
        $this->numerosIntentados = $obj->numerosIntentados;
    }

    public function guardar(){
        $_SESSION["Numero"] = base64_encode(serialize($this));
    }



}

?>