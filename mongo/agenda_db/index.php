<?php
require_once('modelo/Agenda.php');
require_once('vista/html.php');
require_once('vista/tablaContactos.php');
require_once('vista/formContacto.php');
session_start();
$mensajeError = null;
try {
    $agenda = new Agenda('',Agenda::MONGO);
    $contacto = $agenda->nuevoContacto();

    //Modificar contacto
    if ($_SERVER["REQUEST_METHOD"]=="GET" 
        && isset($_GET['modificar'])) {
        if (isset($_GET['id_contacto'])) {
          $contacto = $agenda->contactoClass::getByID($_GET['id_contacto']);
        //  $contacto = $agenda->getContactoById($_GET['id_contacto']);
          $_SESSION['modificar']['id']=$_GET['id_contacto'];
        } else {
          unset( $_SESSION['modificar']);
        }
           
    }

    if ($_SERVER["REQUEST_METHOD"]=="POST"  
      && isset($_POST['js'])
      && isset($_POST['contacto']) )  {
      
      $con = $agenda->nuevoContacto($_POST['contacto']);
      $con->guardar();
      echo json_encode(['OK'=>$con,'html'=>filaContacto($con)]);

      exit();
    }

    //Eliminar contacto
    if ($_SERVER["REQUEST_METHOD"]=="GET" 
      && isset($_GET['eliminar']) && isset($_GET['id_contacto'])) {
        $agenda->contactoClass::eliminar($_GET['id_contacto']);
    }
    
    //Eliminar contacto JavaScript JSON
    if ($_SERVER["REQUEST_METHOD"]=="POST" 
      && isset($_POST['eliminar']) && isset($_POST['id_contacto'])) {
        $agenda->contactoClass::eliminar($_POST['id_contacto']);
        echo json_encode(['OK'=>$_POST['id_contacto']]);
        exit(0);
    }

    ///Mostrar formulario contacto X
    if ( $_SERVER["REQUEST_METHOD"]=="POST" 
        && isset($_POST['CargarForm']) 
        && isset($_POST['id_contacto']) ) {
        $contacto = $agenda->contactoClass::getByID($_POST['id_contacto']);
        echo json_encode(['OK'=>true,'html'=>mostrarFormularioContacto($contacto,true)]);
        exit(0);
    }

    //Guardar modificaciones contactos
    if ($_SERVER["REQUEST_METHOD"]=="POST" 
      && isset($_POST['contacto']) 
      && isset($_POST['Guardar'])) {
      $con = $agenda->nuevoContacto($_POST['contacto']);
      if (isset($_SESSION['modificar'])&&$_SESSION['modificar']['id']!= $con->id_contacto) {
        $con->id_contacto  = $_SESSION['modificar']['id'];
      } 
      $con->guardar();
      unset($_SESSION['modificar']);
    }

    //Vista 
    if ($_SERVER["REQUEST_METHOD"]=="GET" 
      && isset($_GET['modificar'])) {
        //Vista modificar
        html($mensajeError,mostrarFormularioContacto($contacto));
      } else {
        //Vista mostrar contactos
        html($mensajeError,mostrarContacto($agenda->contactoClass::getAll()));
      }

} catch (Exception $e) {
  html( $e->getMessage(),'<strong><h1>Se ha producido un error fatal. <br> -- llame al soporte técnico --</h1></strong>');
}



