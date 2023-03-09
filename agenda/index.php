<?php
require_once(dirname(__FILE__)."/session/usuarioSession.php");
require_once(dirname(__FILE__)."/modelo/usuario.php");
require_once(dirname(__FILE__)."/vista/login.php");
require_once(dirname(__FILE__)."/vista/cabecera.php");
require_once(dirname(__FILE__)."/vista/pie.php");
require_once(dirname(__FILE__)."/controller/EventosSessiones.php");
require_once(dirname(__FILE__)."/vista/eventos/ListadoEventos.php");

$secretUser = new Usuario(0,"Luis","luis@test.com",1,"12345",true);
$contenido ="";
try {
  //Validar usuario
  if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["correo"])&& isset($_POST["password"])) {
   if (!$secretUser->comprobarValidarUsuario($_POST["correo"],$_POST["password"])) {
     throw new Exception("Acceso denegado");
   } else {
      UsuarioSession::createUsuarioSession($secretUser);
      
   }
  }
  $usuario = UsuarioSession::getUsuarioSession();
  //Usuario validado
  $accion = null;
  $id_evento = null;
  if ($_SERVER["REQUEST_METHOD"]== "GET" && isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (isset($_GET['id_evento'])) {
      $id_evento = $_GET['id_evento'];
      
      
    }
    switch ($accion) {
      case 'cerrar': UsuarioSession::closeSession();          
            break;
      case 'eliminar': 
        EventosSessiones::Eliminar($id_evento);
        $accion = "listarEventos";
        break;
    }


  }

  switch ($accion) {
    case 'cerrar':
      $contenido = getLogin();
      break;
    case 'listar':
      $eventos = EventosSessiones::listar();
      $contenido = ListadoEventos($eventos);
      break;
    case 'nuevo':
      break;
    
    default:
            $eventos = EventosSessiones::listar();
            $contenido = ListadoEventos($eventos);

  }
} catch(LoginException $e) { 
   $contenido = getLogin($e->getMessage());
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