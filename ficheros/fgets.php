<?php
$fich = fopen("datos.csv","r+");
if ($fich === FALSE) {
    echo "No existe el fichero datos.csv";
} else {
    while (!feof($fich)) {
        echo "<p>".fgets($fich)."</p>";
    }
    //fputs($fich,"\n4 Marcos Fernandez Marcos@empresa.com	12345");
}



echo "<p>-------------------------</p>";
if ($fich === FALSE) {
    echo "No existe el fichero datos.csv";
} else {
    rewind($fich);
    while (!feof($fich)) {
        echo "<p>".fgets($fich)."</p>";
    }
    //fputs($fich,"\n4 Marcos Fernandez Marcos@empresa.com	12345");
}
fclose($fich);
echo "<p>-------------------------</p>";
$fich2 = fopen("binario.txt","r");
if ($fich === FALSE) {
    echo "No existe el fichero binario.csv";
} else {
    fseek($fich2,10);
    while (!feof($fich2)) {
        echo "<p>".fread($fich2,1)."</p>";
    }
}
fclose($fich2);