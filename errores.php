<?php
function manejador_errores($errno,$str,$file,$line) {
    echo "Ocurrio un error en el fichero $file line $line [$errno - $str]\n";
}
set_error_handler("manejador_errores");
$old_error_reporting = error_reporting(E_ERROR);
echo ("1ABC"+ 5)."\n";
error_reporting($old_error_reporting);
echo ("5ABC"+ 5)."\n";