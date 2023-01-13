<?php
require_once("../seguridad.php");
require_once("../controlador/cusuario.php");
require_once("../maqueta/maqueta.php");
$id="";
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if  (isset($_GET["idusuario"])) {
        $id = $_GET["idusuario"];
        $usuario = CUsuario::getUsuario($id);
    } else {
        $usuario = new Usuario(null,null);
    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["idusuario"])) {
    $id = $_POST["idusuario"];
    if ($id!=0 && $id!="" ) {
        $usuario = CUsuario::getUsuario($id);
    } else {
        $usuario = new Usuario(null,null);
    }
       
    $usuario->setNombre($_POST["nombre"]);
    $usuario->setApellidos($_POST["apellidos"]);
    $usuario->setCorreo($_POST["correo"]);
    if ( $_POST["password"] != "") {
        $usuario->setPassword($_POST["password"]);
    }
    CUsuario::Guardar($usuario);
    header("location:".$_SESSION["PHPBASE"]."usuario/listar.php");
    exit(0);
}
cabecera("Modificar usuario");
?>
     <h1><?=($id!=0 && $id!="" )?"Modificar usuario":"Nuevo usuario"?></h1>
    
    <form action="" method="post">
        <input type="hidden" name="idusuario" value="<?=$usuario->getIdUsuario()?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?=$usuario->getNombre()?>" required>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required value="<?=$usuario->getApellidos()?>">
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" required value="<?=$usuario->getCorreo()?>">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Guardar">
    </form>
<?php
pie(); 
