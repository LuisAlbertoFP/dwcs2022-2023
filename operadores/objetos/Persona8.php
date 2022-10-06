<?php
class Persona8 {

    function __construct(
      private $dni,
      private $nombre,
      private $apellido) {
    }
    

    public function __toString() {
        return "Persona: ".$this->dni." - ".$this->nombre." ".$this->apellido;
    }

      /**
       * Get the value of dni
       */ 
      public function getDni()
      {
            return $this->dni;
      }

      /**
       * Get the value of nombre
       */ 
      public function getNombre()
      {
            return $this->nombre;
      }

      /**
       * Get the value of apellido
       */ 
      public function getApellido()
      {
            return $this->apellido;
      }
}

$persona = new Persona8("22222222E","Pepe","Gotera López");
echo $persona;