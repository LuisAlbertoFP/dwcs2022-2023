<?php
class Evento {
    public function __construct(
                    private $id_evento=null,
                    private $id_usuario=null,
                    private $nombre=null,
                    private ?DateTime $fecha_inicio=null,
                    private ?DateTime $fecha_fin=null         
    )
    {
        if ($this->id_usuario == null) {
            throw new Exception("El evento necesita tener un usuario asignado");
        }
        if ($this->fecha_inicio == null) {
            $this->fecha_inicio = new DateTime();   
        }
        if ($this->fecha_fin == null) {
            $this->fecha_fin = clone $this->fecha_inicio;
            $this->fecha_fin->modify('+ 1 hour');
           // $this->fecha_fin->add(new DateInterval('PT01H'));
        }        
    }

                    /**
                     * Get the value of id_evento
                     */ 
                    public function getId_evento()
                    {
                                        return $this->id_evento;
                    }

                    /**
                     * Set the value of id_evento
                     *
                     * @return  self
                     */ 
                    public function setId_evento($id_evento)
                    {
                                        $this->id_evento = $id_evento;

                                        return $this;
                    }

                    /**
                     * Get the value of nombre
                     */ 
                    public function getNombre()
                    {
                                        return $this->nombre;
                    }

                    /**
                     * Set the value of nombre
                     *
                     * @return  self
                     */ 
                    public function setNombre($nombre)
                    {
                                        $this->nombre = $nombre;

                                        return $this;
                    }

                    /**
                     * Get the value of fecha_inicio
                     */ 
                    public function getFecha_inicio()
                    {
                                        return $this->fecha_inicio;
                    }

                    /**
                     * Set the value of fecha_inicio
                     *
                     * @return  self
                     */ 
                    public function setFecha_inicio($fecha_inicio)
                    {
                                        $this->fecha_inicio = $fecha_inicio;

                                        return $this;
                    }

                    /**
                     * Get the value of fecha_fin
                     */ 
                    public function getFecha_fin()
                    {
                                        return $this->fecha_fin;
                    }

                    /**
                     * Set the value of fecha_fin
                     *
                     * @return  self
                     */ 
                    public function setFecha_fin($fecha_fin)
                    {
                                        $this->fecha_fin = $fecha_fin;

                                        return $this;
                    }

                    /**
                     * Get the value of id_usuario
                     */ 
                    public function getId_usuario()
                    {
                                        return $this->id_usuario;
                    }

                    /**
                     * Set the value of id_usuario
                     *
                     * @return  self
                     */ 
                    public function setId_usuario($id_usuario)
                    {
                                        $this->id_usuario = $id_usuario;

                                        return $this;
                    }

    function __serialize(): array
    {
        return [
        "id_evento"=>$this->id_evento,
        "id_usuario"=>$this->id_usuario,
        "nombre"=>$this->nombre,
        "fecha_inicio"=>$this->fecha_inicio,
        "fecha_fin"=>$this->fecha_fin  ];
    }

    function __unserialize(array $data): void
    {
        $this->id_evento = $data["id_evento"];
        $this->id_usuario = $data["id_usuario"];
        $this->nombre = $data["nombre"];
        $this->fecha_inicio = $data["fecha_inicio"];
        $this->fecha_fin  = $data["fecha_fin"];
    }


                 
}
