<?php
$permisos = 5;
if ($permisos>>2) {
    echo "Tiene permisos de lectura\n";
} else {
    echo "NO Tiene permisos de lectura\n";
}


$permisos = 5;
if (($permisos&2)==2) {
    echo "Tiene permisos de escritura\n";
} else {
    echo "NO Tiene permisos de escritura\n";
}