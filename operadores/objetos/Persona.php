<?php
class Persona {
    private $dni;
    private $nombre;
    private $apellido;

    function __construct($dni,$nombre,$apellido) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
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

    public function __toString() {
        return "Persona: ".$this->dni." - ".$this->nombre." ".$this->apellido;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }
}

/* $persona = new Persona("11111111E","Pepe","Gotera López");
$persona->setNombre("Marcos");
echo $persona; */