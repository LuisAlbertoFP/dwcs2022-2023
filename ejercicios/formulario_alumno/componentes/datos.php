<?php
function datosAlumno(alumno $alumno)
{
?>
<div>
                             <?php //echo $alumno->getNombre();?>
    <strong>Nombre: </strong><?=$alumno->getNombre()?>
</div>
<div>
    <strong>Apellidos: </strong><?=$alumno->getApellidos()?>
</div>
<div>
    <strong>NIF: </strong><?=$alumno->getNif()?>
</div>
<div>
    <strong>Sexo: </strong><?=$alumno->getSexo()?>
</div>
<?php } ?>