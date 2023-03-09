<?php
function mostrarFormularioContacto($contacto,$javaScript=false){
    ob_start();
?>
<form id="formGuardar" name="formGuardar" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
             <?php
              if (isset($contacto->id_contacto)) {
             ?>
             <input type="hidden" id="id_contacto" name="contacto[id_contacto]" value="<?=$contacto->id_contacto?>">
            <?php } ?>
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="contacto[nombre]" type="text"  value="<?=$contacto->nombre?>" autofocus> <br>
            <label for="apellidos">Apellidos:</label>
            <input id="apellidos" name="contacto[apellidos]" type="text" value="<?=$contacto->apellidos?>"><br>
            <label for="direccion">Dirección:</label>
            <input id="direccion" name="contacto[direccion]" type="text" value="<?=$contacto->direccion?>"><br>
            <label for="telcasa">Teléfono Casa:</label>
            <input id="telcasa" name="contacto[telcasa]" type="text" value="<?=$contacto->telcasa?>"><br>
            <label for="telmovil">Teléfono Movil:</label>
            <input id="telmovil" name="contacto[telmovil]" type="text" value="<?=$contacto->telmovil?>"><br>
            <label for="teltrabajo">Teléfono Trabajo:</label>
            <input id="teltrabajo" name="contacto[teltrabajo]" type="text" value="<?=$contacto->teltrabajo?>"><br>
            <?php 
            if ($javaScript == false ) { ?> 
            <input type="submit" name="Guardar" value="Guardar">
            <input type="submit" name="Cancelar" value="Cancelar">
            <?php } ?>
        </form>

<?php
//Guardo el buffer en una variable
$texto = ob_get_contents();
//Limpio el buffer para que no viaje al cliente y lo limpio
ob_end_clean();
return $texto;
}
?>