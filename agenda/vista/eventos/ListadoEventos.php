<?php 
function ListadoEventos($eventos) {
ob_start();
?>
<h2>Listado de eventos</h2>
<table class="table  table-bordered">
<thead class="thead-dark">
<tr >
    <th scope="col">Nombre</th>
    <th scope="col">Fecha incio</th>
    <th scope="col">Fecha fin</th>
    <th scope="col">Acciones</th>
</tr>
</thead>
<tbody>
<?php 
$formato = 'Y-m-d H:i:s';
foreach ($eventos as $evento) { ?>
    <tr>
        <td><?=$evento->getNombre()?></td>
        <td><?=$evento->getFecha_inicio()->format($formato)?></td>
        <td><?=$evento->getFecha_fin()->format($formato)?></td>
        <td>
        <a href="?accion=modificar&id_evento=<?=$evento->getId_evento()?>" class="btn btn-primary btn-sm " role="button" aria-pressed="true">Modificar</a>
        <a href="?accion=eliminar&id_evento=<?=$evento->getId_evento()?>" class="btn btn-danger btn-sm " role="button" aria-pressed="true"
        onclick="if (confirm('Estas seguro?')){ return true; } else {return false;}">Eliminar</a> 
    
         </td>
    </tr>
<?php }
?>
<tbody>
</table>
<?php
$html = ob_get_contents();
ob_clean();
return $html;
}