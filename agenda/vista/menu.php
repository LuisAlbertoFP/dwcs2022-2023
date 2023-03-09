<?php 
require_once(dirname(__FILE__)."/../session/usuarioSession.php");
function getMenu() {
ob_start();
if (UsuarioSession::isRegistered()) {
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Eventos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?accion=listar&tipo=evento">Listado de Eventos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?accion=nuevo&tipo=evento">Nuevo Evento</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?accion=listar&tipo=usuario">Listado de Usuarios</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?accion=nuevo&tipo=usuario">Nuevo Usuario</a>
        </div>
      </li>
        <li><a class="nav-link" href="?accion=cerrar">Cerrar Sesión</a></li>
    </ul>
  </div>
</nav>  
<?php
}
$html = ob_get_contents();
ob_clean();
return $html;
}