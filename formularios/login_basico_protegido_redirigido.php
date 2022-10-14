<?php
//usuario = usuario;
//clave = 1234
if (isset($_POST['usuario']) && isset($_POST['clave'])) {   
    if ($_POST['usuario']=="usuario" && $_POST['clave']=="1234") {
       header("Location:bienvenido.html");
       exit(0);
    } else {
        header("Location:error.html");
        exit(0);
    }
}

echo "me verás solo, si me llamas directamente";