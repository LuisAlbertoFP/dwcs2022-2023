<?php
$cds = new DOMDocument();
$cds->load("cds.xml");
// echo "<pre>";
// print_r($cds->firstElementChild);
// echo "</pre>";
$precios = $cds->getElementsByTagName("PRECIO");
foreach ($precios as $precio) {
    echo $precio->nodeValue ."<br>";
}
echo "----------------<br>";
$lcds = $cds->getElementsByTagName("CD");
foreach ($lcds as $cd) {
   // $atributos = $cd->childNodes;
    //foreach ($)
    echo $cd->getElementsByTagName("TITULO")->count()."<br>";
    echo $cd->getElementsByTagName("TITULO")->item(0)->nodeValue .": ".
         $cd->getElementsByTagName("PRECIO")->item(0)->nodeValue."<br>";
}
