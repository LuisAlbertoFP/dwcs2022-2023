<?php
class Numero{
    protected $valorNumero;
    protected $intentos;
    protected $mensaje;
    protected $numerosIntentados;

    function __construct()
    {
        $this->iniciarJuego();
    }

    public function __sleep()
    {
        return array('valorNumero', 'intentos', 'numerosIntentados');
    }

    public function __wakeup()
    {
        
    }


    function iniciarJuego(){
     $this->valorNumero = rand(0, 100);
     $this->intentos = 5;
     //$this->mensaje = "Introduce un númerito";
     $this->numerosIntentados = [];
    }



    function jugarNumero($numero){
        if ($numero == $this->valorNumero) {
            $this->mensaje = "Has acertado el número ({$this->valorNumero})";
            $this->iniciarJuego();
        } else {
            if ($numero > $this->valorNumero) {
                $this->mensaje = "El número " . $numero . " Es mayor que el buscado.";
            } else {
                $this->mensaje = "El número " . $numero . " Es menor que el buscado.";
            }
            $this->intentos --;
            $this->numerosIntentados[] = $numero;
            if ($this->intentos < 1) {
                $this->iniciarJuego();
                $this->mensaje = "Has perdido, el número era: {$this->valorNumero}.";

            }
        }
        
    }


    function getMensaje(){
        return $this->mensaje;
    }

    function getNumerosIntentados(){
        $salidaNumerosIntentados ="";
        if(is_array($this->numerosIntentados)){
            $salidaNumerosIntentados = implode(", ", $this->numerosIntentados);  
        }
        return $salidaNumerosIntentados;
    }

    /**
     * Get the value of valorNumero
     */ 
    public function getValorNumero()
    {
        return $this->valorNumero;
    }

    public function getIntentos()
    {
        return $this->intentos;
    }
}


?>