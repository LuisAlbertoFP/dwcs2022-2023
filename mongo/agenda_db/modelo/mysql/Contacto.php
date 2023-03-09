<?php
require_once('BD.php');
require_once(dirname(__FILE__)."/../Contacto.php");
class Contacto extends Modelo\Contacto {
   
   public function guardar(){  
        $datos = [
                ':id_contacto'=>$this->id_contacto,  
                ':nombre'=>$this->nombre,
                ':apellidos'=>$this->apellidos,
                ':direccion'=>$this->direccion,
                ':telcasa'=>$this->telcasa,
                ':telmovil'=>$this->telmovil,
                ':teltrabajo'=>$this->teltrabajo];  
        try {
            $sql = "REPLACE INTO contacto (id_contacto,nombre,apellidos,direccion,telcasa,telmovil,teltrabajo) 
                    VALUES (:id_contacto,:nombre,:apellidos,:direccion,:telcasa,:telmovil,:teltrabajo)";
            $preparada = BD::getConexion()->prepare($sql);	
            $preparada->execute($datos);
            if (!isset($this->id_contacto)) {
                $this->id_contacto = BD::getConexion()->lastInsertId();
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
    }

   public static function eliminar($id) {
    try {
      $sql = "DELETE FROM contacto where id_contacto = :id_contacto"; 
      $preparada = BD::getConexion()->prepare($sql);
      $preparada->execute([':id_contacto'=>$id]);
    } catch (PDOException $e) {
        throw new Exception('Error con la base de datos: ' . $e->getMessage());
    }
   }

   public static function getAll($filtro=null){
        $contactos  = null;
        try {
            $sql = "SELECT nombre,apellidos,direccion,telcasa,telmovil,teltrabajo,id_contacto FROM contacto"; 
            $preparada = BD::getConexion()->prepare($sql);	
            $preparada->execute();
            if ($preparada->rowCount() > 0) {
                $preparada->setFetchMode(PDO::FETCH_CLASS,  __CLASS__);
                $contactos = $preparada->fetchAll();
            }
        } catch (PDOException $e) {
            throw new Exception('Error con la base de datos: ' . $e->getMessage());
        }
        return $contactos;
   }
   public static function getByID($id) {
    $contacto  = null;
    try {
        $sql = "SELECT nombre,apellidos,direccion,telcasa,telmovil,teltrabajo,id_contacto FROM contacto WHERE id_contacto=:id_contacto"; 
        $preparada = BD::getConexion()->prepare($sql);	
        $preparada->execute([':id_contacto'=>$id]);
        if ($preparada->rowCount() == 1) {
            $preparada->setFetchMode(PDO::FETCH_CLASS,  __CLASS__);
            $contacto = $preparada->fetch();
        }
    } catch (PDOException $e) {
        throw new Exception('Error con la base de datos: ' . $e->getMessage());
    }
    return $contacto;
   }

}

