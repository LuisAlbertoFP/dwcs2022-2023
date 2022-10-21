<?php
if (!isset($_COOKIE["nombre"])) {
    setcookie("nombre", "Luis", time()+3600);
    setcookie("apellidos", "fernandez", time()+3600);
} else {
    setcookie("nombre", "", time()-3600);
}
echo "Mi nombre es: ".$_COOKIE["nombre"];
//No puedo modificar la cookie aqui ya que la cabecera de http ya ha sido
// enviada al cliente
//setcookie("nombre", "Luis", time()-3600);
