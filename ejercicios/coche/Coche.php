<?php
require_once("Motor.php");
require_once("Rueda.php");
require_once("Puerta.php");
class Coche {
    private $motor;
    private $ruedas;
    private $puertas;
    private $estadoDeposito;

    //function  __construct($litros=10,$motor=null,$ruedas=null,$puertas=null)
    function  __construct($litros=10)
    {
       $this->estadoDeposito = $litros;
       $this->motor = new Motor();
       // if ($ruedas == null) {
            for ($i=1;$i<=4;$i++) {
                $this->ruedas[]= new Rueda();
            }
       // }
       for ($i=1;$i<=2;$i++) {
            $this->puertas[]= new Puerta();
       }
    }

    function llenar($litros){
        $this->estadoDeposito += $litros;
    }

    function getEstadoDeposito() {
        return $this->estadoDeposito;
    }


    function getMotor() {
        return $this->motor;
    }

    function getRueda($id_rueda) {
        return $this->ruedas[$id_rueda];
    }

    function getPuerta($id_puerta) {
        return $this->puertas[$id_puerta];
    }
}