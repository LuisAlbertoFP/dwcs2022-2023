<?php
function mostrarContacto($contactos) {
    //Comienzo de la captura del buffer
    ob_start();
?>
<a href="?modificar=true">Nuevo contacto</a>
<table id="TablaContacto">
<thead>
<tr>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Dirección</th>
    <th>Teléfono Casa</th>
    <th>Teléfono Movil</th>
    <th>Teléfono Trabajo</th>
</tr>
</thead>
<tbody  id="TablaContactoBody">
<?php
foreach ($contactos as $contacto) {
 echo filaContacto($contacto);
} //foreach ?>
</tbody>
</table>

<?php 
//Guardo el buffer en una variable
$texto = ob_get_contents();
//Limpio el buffer para que no viaje al cliente y lo limpio
ob_end_clean();
return $texto;
}


function filaContacto($contacto) {
    //Comienzo de la captura del buffer
    ob_start();
?>
<tr id="Contacto<?=$contacto->id_contacto;?>">
    <td class="nombre"><?=$contacto->nombre;?></td>
    <td class="apellidos"><?=$contacto->apellidos;?></td>
    <td class="direccion"><?=$contacto->direccion;?></td>
    <td class="telcasa"><?=$contacto->telcasa;?></td>
    <td class="telmovil"><?=$contacto->telmovil;?></td>
    <td class="teltrabajo"><?=$contacto->teltrabajo;?></td>
    
    
   <?php /*   <a href="?eliminar=true&id_contacto=<?=$contacto->id_contacto;?>">eliminar</a></td> 
    <td> <a href="?modificar=true&id_contacto=<?=$contacto->id_contacto;?>">modificar</a></td> */?>
    <td><button  class="btn btn-secondary bt_modificar btn-sm" data-bs-toggle="modal" data-bs-target="#ModalGuardar" id_contacto="<?=$contacto->id_contacto;?>">Modificar</button> 
    <td><button  class="btn btn-danger eliminar btn-sm" id_contacto="<?=$contacto->id_contacto;?>"  data-bs-toggle="modal"  data-bs-target="#modalEliminar" >Eliminar</button> 
</tr>
<?php 
//Guardo el buffer en una variable
$texto = ob_get_contents();
//Limpio el buffer para que no viaje al cliente y lo limpio
ob_end_clean();
return $texto;
} ?>


