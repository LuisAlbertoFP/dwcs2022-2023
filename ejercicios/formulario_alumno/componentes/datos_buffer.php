<?php
function datosAlumno(alumno $alumno)
{
  ob_start();
 /* $texto = "<div>
  <strong>PEPE</strong>
  </div>
  ";
  echo "NO ME GUSTA NADA";*/
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
<?php 
  $texto = ob_get_contents();
  ob_end_clean();
  return $texto;
} ?>