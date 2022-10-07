<?php
class NIF {
    //NO REPETIR CÓDIGO
    private $dni;
    private $letra;
    private const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    function __construct($dni=0)
    {
        $this->setDNI($dni);
    }
    
    public function getDNI() {
        return $this->dni;
    }

    public function setDNI($dni) {
        $this->dni = $dni;
        $this->letra = ($this->dni === 0)?" ":$this->calcularLetra();
    }

    public function leer(){
        echo "Introduzca un DNI:";
        $this->setDNI(readline());
    }

    public function mostrar(){
        echo "letra1: ".$this->letra ."\n"; 
       return  $this->dni."-".$this->letra;  
    }

    private function calcularLetra() {
        $num_letra = ($this->dni % 23);
        echo "letra: ".$this->letra ."\n"; 
        return NIF::letras[$num_letra];     

        
    }

}