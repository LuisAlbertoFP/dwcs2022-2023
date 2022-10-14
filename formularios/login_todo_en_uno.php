<?php
$error= false;
$usuario= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario']) && isset($_POST['clave'])) {
        if ($_POST['usuario']=="usuario" && $_POST['clave']=="1234") {
            header("Location:bienvenido.html");
            exit(0);
        } else {
            $error = true;
            $usuario = $_POST['usuario'];
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Login</title>
</head>
<body>
    <?php
       if ($error) {
        echo '<p class="error">Acceso denegado</p>';
       }
    ?>
    <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])  ?>" method="post">
        <input name="usuario" type="text" value="<?=$usuario?>" />
        <input name="clave" type="password" />
        <input type="submit" name="entrar" />

    </form>
</body>
</html>