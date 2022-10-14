<?php
class rectangulo {
    private $x = 0;
    private $y = 0;
    private $ancho;
    private $alto;

    function __construct($xi,$yi,$xf=null,$yf=null)
    {
        if ( is_null($xf)  || is_null($yf)) {
            $this->ancho = $xi;
            $this->alto = $yi;
        } else {
            $this->x = $xi;
            $this->y = $yi;
            $this->ancho = $xf - $xi;
            $this->alto = $yf - $yi;
        }
    }

    public function area() {
        return $this->ancho * $this->alto;
    }

    public function desplazar($x,$y) {
        $this->x += $x;
        $this->y += $y;
    }

    public function __toString()
    {
        return   "xi: ".$this->x.
               ", yi: ".$this->y.
               ", xf: ".$this->x+$this->ancho.
               ", yf: ".$this->y+$this->alto;       
    }

}