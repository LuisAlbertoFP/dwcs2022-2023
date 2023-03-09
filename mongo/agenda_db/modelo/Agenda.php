<?php

class Agenda {
 
   private $usuario;
   public $contactos;
   public $contactoClass;
   public const MYSQL ="mysql";
   public const MONGO ="mongo";


   public function __construct($usuario=null,$conexion='mysql') {
        require_once($conexion.'/Contacto.php');
        $this->contactoClass = Contacto::getClass();
        if (isset($usuario)) {
            $this->usuario = $usuario;
        }  else {
            //TODO cargar datos sesión y validar si es necesario
        }
     //   $this-> cargarContactos();
   }
    
    public function nuevoContacto($datos=null) {
        $contacto = new Contacto();
        if (isset($datos)) {
            $contacto = Contacto::crearObjetoContacto($datos);
        }
        return $contacto;
    }

    public function cargarContactos() {
        $this->contactos = Contacto::getAll();
    }


    public function getContactoById($id) {
        $contacto = new Contacto();
        $Arraycontactos = array_filter( $this->contactos,function ($con) use ($id) {
            return $con->id_contacto == $id;
        }) ;
       if (count($Arraycontactos)==1) {
         $contacto = array_shift($Arraycontactos);
       }
       return $contacto;
    }
 
}