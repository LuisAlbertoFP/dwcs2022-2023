<?php
require_once (dirname(__FILE__)."/Libro.php");
class XmlLibro extends Libro {
    private static $xmlDoc;


    public static function getLibro($xmlLibro) {
            $libro = new Libro(
                $xmlLibro->attributes->getNamedItem("id")->nodeValue,
                $xmlLibro->getElementsByTagName("author")->item(0)->textContent,
                $xmlLibro->getElementsByTagName("title")->item(0)->textContent,
                $xmlLibro->getElementsByTagName("genre")->item(0)->textContent,
                $xmlLibro->getElementsByTagName("price")->item(0)->textContent,
                $xmlLibro->getElementsByTagName("publish_date")->item(0)->textContent,
                $xmlLibro->getElementsByTagName("description")->item(0)->textContent
            );
            return $libro;
    }

    public static function appendLibro(DOMDocument $xmlDoc,$libro) {
        $nuevoLibro = $xmlDoc->createElement("book");
        $nuevoLibro->setAttribute("id",$libro->getId());

        $author = $xmlDoc->createElement("author",$libro->getAuthor());
        $title = $xmlDoc->createElement("title",$libro->getTitle());
        $genre = $xmlDoc->createElement("genre",$libro->getGenre());
        $price = $xmlDoc->createElement("price",$libro->getPrice());
        $publish_date = $xmlDoc->createElement("publish_date",$libro->getPublish_date());
        $description = $xmlDoc->createElement("description",$libro->getDescription());
        
        $nuevoLibro->appendChild($author);
        $nuevoLibro->appendChild($title);
        $nuevoLibro->appendChild($genre);
        $nuevoLibro->appendChild($price);
        $nuevoLibro->appendChild($publish_date);
        $nuevoLibro->appendChild($description);
        $xmlDoc->documentElement->appendChild($nuevoLibro);     


        return $xmlDoc;
    }

}