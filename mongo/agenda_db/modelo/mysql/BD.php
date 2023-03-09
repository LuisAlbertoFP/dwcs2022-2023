<?php
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
            $cadena_conexion = 'mysql:dbname=agenda;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            self::$conexion = new PDO($cadena_conexion, $usuario, $clave, [PDO::ATTR_PERSISTENT => true]);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        return self::$conexion;
    }
}