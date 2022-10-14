<?php
require_once("rectangulo.php");
$rect = new rectangulo(1,1,5,6);
$rect->desplazar(3,3);
echo $rect.", area: ".$rect->area()."\n";