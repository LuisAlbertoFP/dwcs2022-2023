<?php
namespace Modelo;
require_once('InterfazBD.php');
abstract class Usuario  implements InterfazBD {
    public $id_usuario;
    public $nombre;
    public $clave;

    public abstract static function login($nombre,$contraseña);
    public abstract function guardar();
    public abstract static function eliminar($id);
    public abstract static function mostrar($filtro);
    public abstract static function getByID($id);
}
