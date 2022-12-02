<?php
class Correo {
    private $from;
    private $asunto;
    private $mensaje;

    public function __construct($from,$asunto,$mensaje)
    {
        $this->setFrom($from);
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the value of mensaje
     */ 
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Get the value of asunto
     */ 
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Get the value of from
     */ 
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the value of from
     *
     * @return  self
     */ 
    public function setFrom($from)
    {
        if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
            $this->from = $from;
        } else {
            throw new Exception("Email '$from' incorrecto ");
        }
        return $this;
    }
}