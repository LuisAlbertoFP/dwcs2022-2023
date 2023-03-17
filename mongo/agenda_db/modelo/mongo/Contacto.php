<?php

use PhpParser\Node\Expr\Cast\Array_;

require_once('BD.php');
require_once(dirname(__FILE__)."/../Contacto.php");
class Contacto extends Modelo\Contacto implements MongoDB\BSON\Persistable {
   
   public function guardar(){  
        //Todo Guardar
        if (!isset($this->id_contacto)) {
            $res = BD::getConexion()->contactos->insertOne($this);
            $this->id_contacto =  $res->getInsertedId();
        } else {
            BD::getConexion()->contactos->updateOne(
                [ "_id" => new MongoDB\BSON\ObjectID($this->id_contacto) ],
                [ '$set' =>  $this]);
        }
    }

   public static function eliminar($id) {
       //Eliminar
       BD::getConexion()->contactos->deleteOne(
        [ "_id" => new MongoDB\BSON\ObjectID($id) ]
       );
   }


   public static function getAll($filtro=null){  
        $cursor = BD::getConexion()->contactos->find();
        $cursor->setTypeMap(['root' => Contacto::getClass()]);
        $contactos = $cursor->toArray(); 
        return $contactos;
   }
   public static function getByID($id) {
     return  BD::getConexion()->contactos->findOne( 
         [ "_id" => new MongoDB\BSON\ObjectID($id) ],
        ['typeMap'=>['root' => Contacto::getClass()]]);
   }

   
   public function bsonUnserialize(array  $data): void
   {

    //$this->nombre = $data["nombre"];
      foreach ($data as $key => $value) {
          switch ($key) {
              case '_id': $this->id_contacto = $value; break;
              default: $this->$key = $value; break;
          }
      }
   }
   
   public function bsonSerialize(): array
   {
       $array = (array) $this;
       if (isset( $this->id_contacto)) {
        $array['_id'] = new MongoDB\BSON\ObjectID($this->id_contacto);
       }
       unset($array['id_contacto']);
       return $array;
   }

}

