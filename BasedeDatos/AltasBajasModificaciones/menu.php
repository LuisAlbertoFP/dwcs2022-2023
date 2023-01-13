<?php
function menu() {
?>
<nav>
    <ul>
        <li>
            Usuarios
            <ul>
                <li><a href="<?=$_SESSION["PHPBASE"]?>usuario/listar.php">Listado usuarios</a></li>
                <li><a href="<?=$_SESSION["PHPBASE"]?>usuario/guardar.php">Nuevo Usuario</a></li>
            </ul>
        </li>
    </ul>
</nav>
<?php
}