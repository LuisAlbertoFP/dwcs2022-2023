<?php
require_once(dirname(__FILE__)."/session/usuarioSession.php");
require_once(dirname(__FILE__)."/modelo/usuario.php");
require_once(dirname(__FILE__)."/vista/login.php");
require_once(dirname(__FILE__)."/vista/cabecera.php");
require_once(dirname(__FILE__)."/vista/pie.php");

$secretUser = new Usuario(0,"Luis","luis@test.com",1,"12345",true);
$contenido ="";
try {
  
  if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"])) {
   if (!$secretUser->comprobarValidarUsuario($_POST["correo"],$_POST["password"])) {
     throw new Exception("Acceso denegado");
   }
  }
  $usuario = UsuarioSession::getUsuarioSession();
} catch(LoginException $e) { 
   $contenido = getLogin();
}
catch(Exception $e) { 
    $contenido = "Otro error";
  }

?>





<?=getCabecera()?>
<?=$contenido?>
<?php
/*
  $date = new DateTime();
  $result = $date->format('d-m-Y H:i');
  echo "fecha:".$result.'<input type="datetime-local">';
  */
?>


<?=getPie()?>


   

