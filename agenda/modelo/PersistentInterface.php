<?php
interface PersistentInterface {
    function guardar($datos);
    function modificar($datos);
    function listar();
    function eliminar($id);
}