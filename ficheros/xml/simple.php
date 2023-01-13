<?php
$datos = simplexml_load_file("cds.xml");
echo "<br>";
if ($datos === FALSE) {
    echo "no existe el fichero cds.xml";
} else {
    foreach($datos as $valor) {
        echo "<pre>";
        print_r($valor);
        echo "</pre>";
    }
}
echo "<p>----------------</p>";
$precios = $datos->xpath("//PRECIO");
foreach ($precios as $precio) {
    echo $precio[0];
    echo "<br>";
}

foreach($datos as $cd) {
    echo "<pre>";
    echo $cd->TITULO. ": ".$cd->PRECIO;
    echo "</pre>";
}