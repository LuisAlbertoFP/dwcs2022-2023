<?php
function palindromo($cadena){
    $invertida = strrev($cadena);
    if (strcasecmp($invertida,$cadena)==0) {
        echo "Palíndroma";
    } else {
        echo "No es palíndroma";
    }
}

echo palindromo("Ana");