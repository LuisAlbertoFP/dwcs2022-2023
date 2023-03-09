<?php
//SEGURIDAD----- NO ENTRAR POR AQUÍ SIN AUTORIZACIÓN
if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $texto = file_get_contents("php://input");
    $vars = json_decode($texto);
    //echo json_encode(['ok'=>$vars->id_contacto,'vars'=>$_REQUEST]);
    echo json_encode(['ok'=>$texto,'vars'=>$_REQUEST]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo json_encode(['OK'=>$_POST['id_contacto']]);
}
    

    