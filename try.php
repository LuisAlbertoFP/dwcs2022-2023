<?php

function dividir($dividendo, $divisor){
    $resultado = 0;
    try {
        if ($divisor == 0) {
            throw new Exception("Divisor cero");
        }
        $resultado = $dividendo / $divisor;
        echo "$dividendo / $divisor = ".$resultado."\n";
    } catch (DivisionByZeroError $e) {
        echo "Error división por 0\n";
    }
    catch (TypeError $e) {
        echo "Uno de los operandos es una cadena\n";
    } 
    catch (Exception $e) {
        echo "Error: ". $e->getMessage()."\n";
    }
    finally {
        echo "Hemos terminado\n";
    }
}


function dividir2($dividendo, $divisor) {
    if ($divisor == 0) {
        throw new Exception("Divisor cero");
    }
    return $dividendo / $divisor;
}

dividir("A",2);

//try {
    dividir2(4,0);
//} catch (Exception $e) {
//    echo "Error2: ". $e->getMessage()."\n";    
//}

echo "esto no se ve\n";