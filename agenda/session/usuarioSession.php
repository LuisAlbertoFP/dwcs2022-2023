<?php
require_once(dirname(__FILE__)."/../modelo/usuario.php");
class LoginException extends Exception {

}
class UsuarioSession extends Usuario {
    private static UsuarioSession $usuario;

    public static function isRegistered() {
        if (session_status() !== PHP_SESSION_ACTIVE ) session_start(); 
        return isset($_SESSION["usuario"]);
    }
    public static function getUsuarioSession() {
        if (session_status() !== PHP_SESSION_ACTIVE ) session_start(); 
        if (!isset($_SESSION["usuario"])) {
            throw new LoginException("Sesión no creada");
        }
        $user = $_SESSION["usuario"];
        self::$usuario = new UsuarioSession($user["id_usuario"],$user["nombre"],$user["correo"],$user["rol"]);
        return self::$usuario;
    }
    public static function createUsuarioSession($usuario=null) {
        if (isset($usuario)) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                self::$usuario = new UsuarioSession($usuario->getIdUsuario(),
                $usuario->getNombre(),$usuario->getCorreo(), $usuario->getRol());
                self::setUsuarioSession();
        }
    }

    private static function setUsuarioSession() {
            if (isset(self::$usuario)) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                $_SESSION["usuario"]["id_usuario"] =self::$usuario->getIdUsuario();
                $_SESSION["usuario"]["nombre"] = self::$usuario->getNombre();
                $_SESSION["usuario"]["correo"] = self::$usuario->getCorreo();
                $_SESSION["usuario"]["rol"] = self::$usuario->getRol();
            }
    }   

    public static function closeSession(){
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
    }
}