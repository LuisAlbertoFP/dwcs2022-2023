<?php
 require_once(dirname(__FILE__)."/XmlLibro.php");
 //$libro = new Libro(1,"aut","tit","gen","price","pdate","desc");
 //var_dump($libro);
$libros = [];
$xmlLibros = new DOMDocument();
$xmlLibros->load(dirname(__FILE__)."/books.xml");
/*$catalogo = $xmlLibros->documentElement;
foreach ($catalogo->childNodes as $hijo) {
    if ($hijo->nodeName == "book") {
        echo  $hijo->nodeName." - ". $hijo->attributes->getNamedItem("id")->nodeValue."\n";
    }
}*/
$librosXML = $xmlLibros->getElementsByTagName("book");
foreach ($librosXML as $libroxml) {
    $libros[] = XmlLibro::getLibro($libroxml);
}
var_dump($libros);


