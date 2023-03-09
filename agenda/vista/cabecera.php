<?php 
require_once(dirname(__FILE__)."/menu.php");
function getCabecera() {
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Agenda</title>
</head>
<body>
    <?=getMenu()?>
<?php
$html = ob_get_contents();
ob_clean();
return $html;
}
