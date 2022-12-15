<?php
class Usuario {

    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $correo;
    private $password;

    public function __construct($idUsuario,$nombre,$apellidos,$correo,$password,$encriptar=false)
    {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        if ($encriptar) {
            $this->password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        }else {
            $this->password = $password;
        }
        

    }

    public function comprobarValidarUsuario($correo, $contraseña) {
        return  password_verify($contraseña,$this->password) && $correo == $this->correo;
    }
    

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }
    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }
}