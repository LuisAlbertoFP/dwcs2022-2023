<?

function validarEntrada($datos) {
    $numFilasColumnas = [8,8];
    if ($datos != "") {
        $numFilasColumnas = explode(",",$datos); 
        switch (count($numFilasColumnas)) {
            case 1:         
                    $numFilasColumnas[] = $datos;
                    break;
            case 2:  break;
            default:
                throw new Exception("Formato de entrada no válido");
        }
        if (!is_numeric($numFilasColumnas[0]) || !is_numeric($numFilasColumnas[1])) {
            throw new Exception("Formato de entrada no válido valores no numéricos");
        }
        if ($numFilasColumnas[0] < 0 || $numFilasColumnas[1]< 0) {
            throw new Exception("Formato de entrada no válido valores menores que cero");
        }
    } 
    return $numFilasColumnas;
}




function generarDNI(){
    $dni = rand(0,99999999);
    $dni = str_pad($dni, 8, "0", STR_PAD_LEFT);
    return $dni.obtenerLetraDNI($dni);
}

function obtenerLetraDNI($dni) {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letra = substr($letras,$dni%23,1);
    return $letra;
}


function generarTablaDNIs($numFilasColumnas){
    $matriz = [];
    for ($i=0;$i<$numFilasColumnas[0];$i++) {
        for ($j=0;$j<$numFilasColumnas[1];$j++) {
            $matriz[$i][$j] = generarDNI();
        }
    }
    return $matriz;
}

function matriz2($matriz) {
    foreach($matriz as &$fila) {
        foreach ($fila as &$dni) {
            if ( in_array(substr($dni,-1), ['A','E'])  ) {
                $nuevoDNI = str_repeat(max(str_split(substr($dni,0,8))),8);
                $dni = "<strong>".$nuevoDNI. obtenerLetraDNI($nuevoDNI)."</strong>";
            }
        }
    }
    return $matriz;
}
