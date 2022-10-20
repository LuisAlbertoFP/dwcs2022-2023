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
        if(!is_numeric($dni)) {
            $this->dni = preg_replace("/[^0-9]+/","",$dni);
            $this->letra = substr($dni,-1);
            if ($this->letra != $this->calcularLetra()) {
                throw new Exception("Letra incorrecta");
            }
        } else {
            $this->dni = $dni;
            $this->letra = ($this->dni === 0)?" ":$this->calcularLetra();
        }
        
    }

    public function leer(){
        echo "Introduzca un DNI:";
        $this->setDNI(readline());
    }

    public function mostrar(){
        echo "letra: ".$this->letra ."\n"; 
       return  $this->dni."-".$this->letra;  
    }

    private function calcularLetra() {
        $num_letra = ($this->dni % 23);
        //echo "letra: ".$this->letra ."\n"; 
        return NIF::letras[$num_letra];     

        
    }

}