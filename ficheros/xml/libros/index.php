<?php
 require_once(dirname(__FILE__)."/XmlLibro.php");
 $xml = new XmlLibro(dirname(__FILE__)."/books.xml",dirname(__FILE__)."/books.xslt");
 echo $xml->toHTML();


