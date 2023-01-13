<?php
require_once("../modelo/usuario.php");
require_once("../BD.php");
class CUsuario  {

    static function Listar(){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "usuario");
    }

    static function getUsuario($idusuario) : Usuario {
        $BD = BD::getConexion();
        $stmt = $BD->prepare("SELECT * FROM usuario where idUsuario = :idusuario");
        $stmt->execute([":idusuario"=>$idusuario]);
        $datos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "usuario");
        //print_r($datos);
        return $datos[0];
        //return $stmt->fetch(PDO::FETCH_CLASS, "usuario");
    }



    static function Eliminar($idusuario){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("DELETE FROM usuario where idUsuario = :idusuario");
        $stmt->execute([":idusuario"=>$idusuario]);
    }

    static function Modificar(Usuario $usuario){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("UPDATE usuario 
                                set nombre = :nombre,
                                    apellidos = :apellidos,
                                    correo = :correo,
                                    password = :password
                                where idUsuario = :idusuario
                            ");
        $stmt->execute([":idusuario"=>$usuario->getIdUsuario(),
                        ":nombre" => $usuario->getNombre(),
                        ":apellidos" => $usuario->getApellidos(),
                        ":correo" => $usuario->getCorreo(),
                        ":password" => $usuario->getPassword()
                        ]);                    
    }


    static function Nuevo(Usuario $usuario){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("INSERT into usuario(nombre,apellidos,correo,password) 
                                VALUES (:nombre, :apellidos, :correo, :password)
                            ");
        $stmt->execute([":idusuario"=>$usuario->getIdUsuario(),
                        ":nombre" => $usuario->getNombre(),
                        ":apellidos" => $usuario->getApellidos(),
                        ":correo" => $usuario->getCorreo(),
                        ":password" => $usuario->getPassword()
                        ]);                    
    }


    static function Guardar(Usuario $usuario){
        $BD = BD::getConexion();
        $stmt = $BD->prepare("REPLACE into usuario(idUsuario,nombre,apellidos,correo,password) 
                                VALUES (:idusuario,:nombre, :apellidos, :correo, :password)
                            ");
        $stmt->execute([":idusuario"=>$usuario->getIdUsuario(),
                        ":nombre" => $usuario->getNombre(),
                        ":apellidos" => $usuario->getApellidos(),
                        ":correo" => $usuario->getCorreo(),
                        ":password" => $usuario->getPassword()
                        ]);                    
    }
}
