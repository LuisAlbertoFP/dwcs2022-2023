<?php
class Ahorcado {
    const PALABRAS = ["suerte","GANAR","perder","aprobar"];
    protected $palabra = "APROBAR";
    protected $palabra_oculta = "______"; //Tantos guiones como letras tiene $palabra
    protected $letras = [];  // Letras jugadas por el jugador en la partida actual
    protected $vidas = 7; //Vidas de las que dispone el jugador para adivinar la $palabra
    protected $partidas_jugadas = 0;  //Partidas totales jugadas por el jugador
    protected $partidas_ganadas = 0;
    private $mensaje =null;
    private $letra;

    public function __construct() {
       
    }


    public function __sleep()
    {
        return array('palabra', 'palabra_oculta', 'letras','vidas', 'partidas_jugadas', 'partidas_ganadas');
    }

    public function __wakeup()
    {
        
    }

    public function iniciarjuego($ganar=null){
        $this->palabra = strtoupper(self::PALABRAS[array_rand(self::PALABRAS)]);
        $this->palabra_oculta = str_repeat("_",strlen($this->palabra));
        $this->letras = [];
        $this->vidas = 7;
        if (!is_null($ganar)) {
            if ($ganar == true) {
                $this->partidas_ganadas++;
            }
            $this->partidas_jugadas++;
        }
    }
 
    public function jugarLetra($letra) {
        $this->letra = strtoupper($letra);
        if (!in_array($letra, $this->letras)) {
            $this->letras[] = $letra;
            $posiciones = $this->posiscionesLetra($this->palabra, $this->letra);
            if ($posiciones) {
                $this->colocarletras($posiciones);
                if ($this->palabra == $this->palabra_oculta) {
                    $this->mensaje = "Has GANADO";
                    $this->iniciarjuego(true);
                }
            } else {
                $this->vidas--;
            }
            if ($this->vidas < 1) {
                $this->mensaje = "Has perdido la palabra era: $this->palabra";
                $this->iniciarjuego(false);
            }
        } else {
            $this->mensaje = "Letra '{$this->letra}' ya jugada";
        }
    }
    
    private function posiscionesLetra() {
        $resultado = [];
        $pos = 0;
        while (($pos = strpos($this->palabra,$this->letra,$pos)) !== false){
              $resultado[] = $pos;
              $pos++;
        }
        return (count($resultado)>0)?$resultado:false;
    }

    private function colocarletras($posiciones) {
        foreach($posiciones as $pos) {
            $this->palabra_oculta[$pos] = $this->letra;
        }
    }




    /**
     * Get the value of mensaje
     */ 
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Get the value of palabra
     */ 
    public function getPalabra()
    {
        return $this->palabra;
    }

    /**
     * Get the value of palabra_oculta
     */ 
    public function getPalabra_oculta()
    {
        return $this->palabra_oculta;
    }

    /**
     * Get the value of letras
     */ 
    public function getLetras()
    {
        return $this->letras;
    }

    /**
     * Get the value of vidas
     */ 
    public function getVidas()
    {
        return $this->vidas;
    }

    /**
     * Get the value of partidas_jugadas
     */ 
    public function getPartidas_jugadas()
    {
        return $this->partidas_jugadas;
    }

    /**
     * Get the value of partidas_ganadas
     */ 
    public function getPartidas_ganadas()
    {
        return $this->partidas_ganadas;
    }
}