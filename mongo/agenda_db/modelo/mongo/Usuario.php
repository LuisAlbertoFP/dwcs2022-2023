<?php
require_once('BD.php');
require_once('../Usuario.php');
class Usuario extends Modelo\Usuario {

    public static function login($nombre,$contraseña) {
        $accesoPermitido = false;
        try {
              $sql = "select nombre,clave from usuario where nombre = :nom && clave = :clave"; 
              $preparada = BD::getConexion()->prepare($sql);	
              $preparada->execute( array(':nom'=>$nombre,':clave'=>$contraseña));
              if ($preparada->rowCount() == 1) {
                  $usuario = $preparada->fetchAll(PDO::FETCH_CLASS, __CLASS__)[0];
                  if ($usuario->nombre==$nombre && $usuario->clave==$contraseña) {
                    $accesoPermitido = true;
                  }
              }
          } catch (PDOException $e) {
               throw new Exception('Error con la base de datos: ' . $e->getMessage());
          }
          return $accesoPermitido;
      }

    public function guardar(){
        throw new Exception("No implementado");
    }
    public static function eliminar($id){
        throw new Exception("No implementado");
    }
    public static function mostrar($filtro){
        throw new Exception("No implementado");
    }
    public static function getByID($id){
        throw new Exception("No implementado");
    }
}
