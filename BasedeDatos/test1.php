<?php
$dsn = "mysql:dbname=docker_demo;host=docker-mysql";
$usuario ="root";
$password = "root123";
try {
    $bd = new PDO($dsn, $usuario, $password);
    $sql = "select * from usuario";
    $datos = $bd->query($sql);
    echo "Total usuarios:". $datos->rowCount();
    foreach($datos as $usu) {
        echo $usu["nombre"].", ";
        echo $usu["apellidos"]."<br>";
    }
    echo "----------------------<br>";
    $stm = $bd->prepare("SELECT * from usuario where idUsuario < :id");
    $stm->execute([":id"=>3]);
    foreach ($stm as $d) {
        echo $d["nombre"].", ";
        echo $d["apellidos"]."<br>"; 
    }


} catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
}

