<?php
require_once (dirname(__FILE__)."/Libro.php");
class XmlLibro extends Libro {


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

    public static function appendLibro($xmlDoc,$libro) {
        
        return $xmlDoc;
    }

}