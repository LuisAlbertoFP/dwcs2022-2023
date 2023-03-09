<?php
namespace Modelo;
require_once('InterfazBD.php');
abstract class Contacto  implements InterfazBD {
   
   public  $id_contacto;
   public  $nombre;
   public  $apellidos;
   public  $direccion;
   public  $telcasa;
   public  $telmovil;
   public  $teltrabajo;

    public static function getClass() {
        return get_called_class();
    } 

    public static function crearObjetoContacto($arrayContacto) {
        $tipo = get_called_class();
        $con = new $tipo();
        if (isset($arrayContacto['id_contacto'])) {
            $con->id_contacto = $arrayContacto['id_contacto'];
        }
        $con->nombre = $arrayContacto['nombre'];
        $con->apellidos = $arrayContacto['apellidos'];
        $con->direccion = $arrayContacto['direccion'];
        $con->telcasa = $arrayContacto['telcasa'];
        $con->telmovil = $arrayContacto['telmovil'];
        $con->teltrabajo = $arrayContacto['teltrabajo'];
        return $con;
    }

   public abstract function guardar();
   public abstract static function eliminar($id);
   public abstract static function getAll($filtro);
   public abstract static function getByID($id);


}

