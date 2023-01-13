<?php

class BD {
    private static $conexion;
    private function __construct()
    {
        
    }

    public static function getConexion() {
        if (!isset(self::$conexion)) {
            $dsn = "mysql:dbname=docker_demo;host=docker-mysql";
            $usuario ="root";
            $password = "root123";
            self::$conexion = new PDO($dsn, $usuario, $password);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexion;
    }
}