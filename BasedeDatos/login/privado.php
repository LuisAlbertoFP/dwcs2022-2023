<?php
require_once("modelo/usuario.php");
require_once("BD.php");
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
}
/*
echo $hash = password_hash("12345",PASSWORD_DEFAULT);

if (password_verify("12345",$hash)) {
    echo "Acceso verificado";
} else {
    echo "acceso denegado";
}
*/
///////////////////////////////////
$mensaje = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Guardar"]) ) {
    $usuario = new Usuario(null,$_POST["nombre"],$_POST["apellidos"],$_POST["correo"],$_POST["password"],true);
    try {
        $bd = BD::getConexion();
        $stmt = $bd->prepare("INSERT INTO usuario(nombre, apellidos, correo, password) VALUES (:nombre, :apellidos, :correo, :password)");
        $stmt->execute([":nombre"=> $usuario->getNombre(),
                    ":apellidos"=> $usuario->getApellidos(),
                    ":correo"=> $usuario->getCorreo(),
                    ":password"=> $usuario->getPassword()]);
        $mensaje = "Usuario creado";
        unset($usuario);
    } catch (Exception $e) {
        $mensaje = $e->getMessage();
    }
} else {
    echo "error";
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Alta usuarios</h1> 
   <div><?=$mensaje?></div>
   <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required value="<?=(isset($usuario))?$usuario->getNombre():""?>">
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required value="<?=(isset($usuario))?$usuario->getApellidos():""?>">
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" required value="<?=(isset($usuario))?$usuario->getCorreo():""?>">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"  required value="<?=(isset($usuario))?$usuario->getPassword():""?>">
        <input type="submit" name="Guardar" value="Guardar">
   </form>
</body>
</html>