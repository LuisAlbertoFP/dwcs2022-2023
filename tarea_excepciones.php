<?php
//A) try catch fuera
function negativo1($num) {
    if ($num<0) {
        throw new Exception("Numero negativo");
    }
    return $num;
}

try {
   echo negativo1(-6)."\n";
} catch (Exception $e) {
    echo "Error: ".$e->getMessage()."\n";
}
//B try catch dentro función 
function negativo2($num) {
    try {
        if ($num<0) {
            throw new Exception("Numero negativo");
        }
        return $num;
    }catch(Exception $e) {
        return "Error: ".$e->getMessage()."\n";
    }
    finally {
        echo "Terminé\n";
    }
}

echo negativo2(-9);