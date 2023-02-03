<?php 
require_once(dirname(__FILE__)."/../session/usuarioSession.php");
function getMenu() {
ob_start();
if (UsuarioSession::isRegistered()) {
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li><a  class="nav-link" href="?accion=cerrar">Cerrar Sesión</a></li>
    </ul>
  </div>
</nav>    
<?php
}
$html = ob_get_contents();
ob_clean();
return $html;
}