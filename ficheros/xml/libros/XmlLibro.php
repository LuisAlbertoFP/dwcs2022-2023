<?php

use PhpParser\Node\Expr\FuncCall;

require_once (dirname(__FILE__)."/Libro.php");
class XmlLibro extends Libro {
    private  $xmlDoc;
    private $xsldoc;
    private $xsl;
    public function __construct(private $xml, private $xslt = null)
    {
        $this->xmlDoc = new DOMDocument();
        $this->xmlDoc->load($xml); 
        if ( !is_null($this->xslt)) {
            $this->xsldoc = new DOMDocument();
            $this->xsldoc->load($xslt);
            $this->xsl = new XSLTProcessor();
            $this->xsl->importStyleSheet($this->xsldoc);
        }
    }


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

    public function appendLibro($libro) {
        $nuevoLibro = $this->xmlDoc->createElement("book");
        $nuevoLibro->setAttribute("id",$libro->getId());

        $author = $this->xmlDoc->createElement("author",$libro->getAuthor());
        $title = $this->xmlDoc->createElement("title",$libro->getTitle());
        $genre = $this->xmlDoc->createElement("genre",$libro->getGenre());
        $price = $this->xmlDoc->createElement("price",$libro->getPrice());
        $publish_date = $this->xmlDoc->createElement("publish_date",$libro->getPublish_date());
        $description = $this->xmlDoc->createElement("description",$libro->getDescription());
        
        $nuevoLibro->appendChild($author);
        $nuevoLibro->appendChild($title);
        $nuevoLibro->appendChild($genre);
        $nuevoLibro->appendChild($price);
        $nuevoLibro->appendChild($publish_date);
        $nuevoLibro->appendChild($description);
        $this->xmlDoc->documentElement->appendChild($nuevoLibro);     
        return $this->xmlDoc;
    }

    public function guardar($fichero=null) {
        $this->xmlDoc->save((!is_null($fichero)?$fichero:$this->xml));
    }

    public function toHTML() {
       return $this->xsl->transformToXML($this->xmlDoc);
    }

}