<?php
//usuario = usuario;
//clave = 1234
if (isset($_POST['usuario']) && isset($_POST['clave'])) {   
    if ($_POST['usuario']=="usuario" && $_POST['clave']=="1234") {
        echo "Hola no se lo digas a nadie: ".$_POST['usuario'];
    }
}
exit(0);
echo "no lo vas a ver nuca";