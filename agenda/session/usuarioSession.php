<?php
require_once(dirname(__FILE__)."/../modelo/usuario.php");
class LoginException extends Exception {

}
class UsuarioSession extends Usuario {
    private static UsuarioSession $usuario;
    public static function getUsuarioSession() {
        if (session_status() !== PHP_SESSION_ACTIVE ) session_start(); 
        if (!isset($_SESSION["usuario"])) {
            throw new LoginException("Sesión no creada");
        }
        $user = $_SESSION["usuario"];
        self::$usuario = new UsuarioSession($user["id_usuario"],$user["nombre"],$user["correo"],$user["rol"]);
        return self::$usuario;
    }

    public static function setUsuarioSession() {
            if (isset(self::$usuario)) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                $_SESSION["id_usuario"] =self::$usuario->getIdUsuario();
                $_SESSION["nombre"] = self::$usuario->getNombre();
                $_SESSION["correo"] = self::$usuario->getCorreo();
                $_SESSION["rol"] = self::$usuario->getRol();
            }
    }   
}