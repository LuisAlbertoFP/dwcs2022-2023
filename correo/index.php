<?php
require_once ("Mail.php");
$mensaje = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Enviar"]) {
    try {
        $mail = new Mail();
        $mail->enviar(new Correo($_POST["from"],$_POST["asunto"],$_POST["mensaje"]));
    } catch (Exception $e) {
        $mensaje = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar correo a soporte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    if (!is_null($mensaje)) { ?>
        <div><?=$mensaje?></div>
   <?php 
    }
    ?>
    <form action="" method="post">
        <h1>Enviar correo a soporte</h1>
        <div><label for="from">De</label>
        <input type="text" name="from" id="from"></div>
        <div><label for="asunto">Aunto</label>
        <input type="text" name="asunto" id="asunto"></div>
        <div><label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea></div>
        <div><input type="submit" value="Enviar" name="Enviar"></div>
        
    </form>
</body>
</html>
