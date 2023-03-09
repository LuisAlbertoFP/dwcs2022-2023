<?php
require_once('vendor/autoload.php');
class BD {
    private static $conexion; 
    private function __construct() {
    }
    
    public static function getConexion() {
        /**
         * INFORMACIÓN DE LA BASE DE DATOS
         * dbname=agenda
         * host=127.0.0.1
         * usuario= root
         * clave=''
         */
        //TODO Implementar este metodo
        if (!isset(self::$conexion)) {
            $cliente = new MongoDB\Client("mongodb://localhost:27017");
            self::$conexion = $cliente->agenda;
        }
        return self::$conexion;
    }
}