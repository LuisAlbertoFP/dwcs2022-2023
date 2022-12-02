<?php
use PHPMailer\PHPMailer\PHPMailer;
require "vendor/autoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();

// cambiar a 0 para no ver mensajes de error
$mail->SMTPDebug = 2;
$mail->SMTPAuth = false;
//$mail->SMTPSecure = "tls";
$mail->Host = "10.10.32.50";
$mail->Port = 25;

// introducir usuario de google
$mail->Username = "";
// introducir clave
$mail->Password = "";

$mail->SetFrom('user@gmail.com', 'Test');
// asunto
$mail->Subject = "Correo de prueba";
// cuerpo
$mail->MsgHTML ('Prueba');
// adjuntos
$mail->addAttachment ("texto.txt");
// destinatario
$address = "destino@servidor.com";
$mail->AddAddress($address, "Test");
// enviar
$resul = $mail->Send();
if(!$resul) {
    echo "Error". $mail->ErrorInfo;
} else {
    echo "Enviado";
}
