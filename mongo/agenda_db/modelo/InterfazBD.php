<?php
namespace Modelo;
interface InterfazBD {
    public function guardar(); //CU
    public static function eliminar($id); //D
    public static function getAll($filtro); //R
    public static function getByID($id); //R
}