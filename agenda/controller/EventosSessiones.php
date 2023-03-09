<?php
require_once (dirname(__FILE__)."/../modelo/evento.php");
class EventosSessiones {
    static $eventos = null;

    private static function getEventos() {
        if (is_null(self::$eventos)) {
            self::$eventos = [1=>new Evento(1,1,"test",new DateTime(),new DateTime()),
             2=>new Evento(2,1,"test1",new DateTime(),new DateTime()),
            3=>new Evento(3,1,"test2",new DateTime(),new DateTime())];
        } 
        return self::$eventos;
    }
    static function Listar() {
        return self::getEventos();
    }

    static function Eliminar($id) {
        self::getEventos();
        unset(self::$eventos[$id]);
    }
}