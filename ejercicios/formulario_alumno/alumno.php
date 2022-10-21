<?php
require_once("../ejercicioDNI/NIF.php");
class alumno {
    private $nombre;
    private $apellidos;
    private $nif;
    private $sexo;
    function __construct($nombre,$apellidos,$nif,$sexo)
    {
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->nif=new NIF($nif);
        $this->sexo=$sexo;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Get the value of nif
     */ 
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }
}