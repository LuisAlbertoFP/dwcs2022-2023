<?php 
function html($mensajeError,$vista) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>AgendaDB</title>
</head>
<body>

<div class="container">
    <?php include_once("navbar.php"); ?>
    <?php if (isset($mensajeError)) { ?>
            <div  class="alert alert-danger" role="alert"><?=$mensajeError?></div>
    <?php } ?>
<?php 
    //mostrarFormularioContacto($contacto);
    echo $vista;
    //mostrarContacto(Contacto::getContactos());
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalGuardar">
  Nuevo Contacto
</button>

<!-- Modal -->
<div class="modal fade" id="ModalGuardar" tabindex="-1" aria-labelledby="ModalGuardarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalGuardarLabel">Nuevo Contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?=mostrarFormularioContacto(new Contacto(),true); ?>
      </div>
      <div class="modal-footer">
        <button type="button" id="btCerrarModalGuardar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="Guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--Eliminar -->
<div class="modal" id="modalEliminar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="textoEliminar">...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btModalEliminar" data-bs-dismiss="modal">eliminar</button>
      </div>
    </div>
  </div>
</div>

</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
     <script src="funciones.js"></script>
</body>
</html>
<?php
}
?>
