<?php
if (isset($_GET['nombre'])) {
    echo "Mi nombre es: ".$_GET['nombre'];
}
echo "<pre>";
var_dump($_GET);
echo "</pre>";