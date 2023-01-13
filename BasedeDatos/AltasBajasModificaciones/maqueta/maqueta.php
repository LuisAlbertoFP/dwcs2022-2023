<?php
require_once(dirname(__FILE__)."/../menu.php");
function cabecera($titulo,$mostrarMenu=true)  {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo?></title>
</head>
<body>
    <?php
    if ($mostrarMenu) {
        menu();
    }
    ?>
<?php
}
?>
<?php
function pie()  {
?>
</body>
</html>
<?php
}
?>