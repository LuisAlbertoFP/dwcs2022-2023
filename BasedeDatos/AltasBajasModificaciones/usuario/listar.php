<?php
require_once("../menu.php");
require_once("../seguridad.php");
require_once("../controlador/cusuario.php");
require_once("../maqueta/maqueta.php");

if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["idusuario"]) && isset($_GET["eliminar"])){
    $id = $_GET["idusuario"];
    $usuario = CUsuario::Eliminar($id);
}
cabecera("Listar Usuarios");
?>
    <table>
        <thead>
            <tr>
                <th>nombre</th>
                <th>apellidos</th>
                <th>correo</th>
                <th>opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $usuarios = CUsuario::Listar();
            foreach ($usuarios as $usuario) {
                ?>
            <tr>
                <td><?=$usuario->getNombre();?></td>
                <td><?=$usuario->getApellidos();?></td>
                <td><?=$usuario->getCorreo();?></td>
                <td><a href="guardar.php?idusuario=<?=$usuario->getIdUsuario()?>">Modificar</a> 
                    <a href="listar.php?eliminar=eliminar&idusuario=<?=$usuario->getIdUsuario()?>"  onclick="return confirm('Estas seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
pie();
