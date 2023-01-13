<?php
require_once("modelo/usuario.php");
require_once("BD.php");
require_once("maqueta/maqueta.php");
session_start();
$mensaje ="";
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"]) ) {
    $correo = $_POST["correo"];
    $passwd = $_POST["password"];
    $bd = BD::getConexion();
   // $sql = "select * from usuario where correo='$correo' and password='$passwd' limit 1";
    //echo $sql;
    //$datos = $bd->query($sql); //JAMAS NO USAR

    $stm = $bd->prepare("SELECT * from usuario where correo = :correo  limit 1");
    $stm->execute([":correo"=>$correo]);

    if ($stm->rowCount() == 1) {
        $_SESSION["correo"] = $correo;
        $user = $stm->fetch();
        $usuario = new Usuario($user["idUsuario"],$user["nombre"],$user["apellidos"],$user["correo"],$user["password"]);
        if (!$usuario->comprobarValidarUsuario($correo,$passwd)){
            $mensaje = "Usuario y/o contraseña incorrectos verificado";
        } else {
            $_SESSION["usuario"]["idUsuario"] = $usuario->getIdUsuario();
            $_SESSION["usuario"]["nombre"] = $usuario->getNombre();
            header("location:index.php");
            exit();
        }

        var_dump($usuario);
    } else {
        $mensaje = "Usuario y/o contraseña incorrectos";
    }


}
cabecera("Login",false);
?>
    <div><?=$mensaje?></div>
    <form action="" method="post">
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"  required>
        <input type="submit" value="Entrar">
    </form>
<?php
pie();