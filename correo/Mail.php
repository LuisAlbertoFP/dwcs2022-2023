<?php
use PHPMailer\PHPMailer\PHPMailer;
require "vendor/autoload.php";
require_once("Correo.php");
class Mail {
    private $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer($host="10.10.32.50",$port =25,$to="soporte@empresa.com");
        $this->mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPAuth = false;
        //$this->mail->SMTPSecure = "tls";
        $this->mail->Host = $host;
        $this->mail->Port = $port;
        // introducir usuario de google
        $this->mail->Username = "";
        // introducir clave
        $this->mail->Password = "";
        // destinatario
        $address = $to;
        $this->mail->AddAddress($address, "Soporte");


    }

    public function enviar(Correo $correo) {
        $this->mail->SetFrom($correo->getFrom(), $correo->getFrom());
        // asunto
        $this->mail->Subject = $correo->getAsunto();
        // cuerpo
        $this->mail->MsgHTML ($correo->getMensaje());
        // enviar
        $resul = $this->mail->Send();
        if(!$resul) {
            throw new Exception("Error". $this->mail->ErrorInfo);
        }
    }
}