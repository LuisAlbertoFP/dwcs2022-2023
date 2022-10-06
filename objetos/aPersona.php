<?php
require_once("iPersona.php");
abstract class aPersona implements iPersona {
    public function tipoClase()
    {
        return  get_class($this);
    }
    public function __toString()
    {
        return $this->getNombre()." ".$this->getApellido();
    } 
}

class Persona extends aPersona {
    private $altura;
    function __construct(private $nombre, private $apellido) {  }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getAltura()
    {
        return $this->altura;
    }
}

class Cliente extends aPersona {
    function __construct(private $nombre, private $apellido,private $saldo) {  }
    public function getSaldo() {
        return $this->saldo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
}

$perso = new Persona("Juan","lolo");
echo $perso->tipoClase();
$cli = new Cliente("Cliente","feo",2000);
echo $cli->tipoClase();
$personas = [$cli,$perso];
foreach ($personas as $d) {
    echo "\n tipo: ".$d;



}

