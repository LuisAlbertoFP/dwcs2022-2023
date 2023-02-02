<?php
class Datos {
    public function __construct(public $nombre,public $apellidos)
    {
        
    }
}

$datos = [["nombre"=> "Luis", "apellidos"=>"Fernandez"],["nombre"=> "Pepe", "apellidos"=>"Gotera"]];
echo $json = json_encode($datos);
var_dump(json_decode($json,true));
echo "----------------\n";
echo $json = json_encode(new Datos("Luis","Fernández"));
var_dump(json_decode($json));