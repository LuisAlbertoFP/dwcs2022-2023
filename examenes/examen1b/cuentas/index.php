<?php

function codigo_cuenta_correcto($numCuenta) {
    $pesos_entid_sucursal = array(4, 8, 5, 10, 9, 7, 3, 6);// 8 elementos para el bloque a
    $pesos_num_cuenta = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);// 10 elementos para el apartado d
    $entsuc = substr($numCuenta,0,8);
    $numc = substr($numCuenta,10);
    $a = generarCodigo(  $entsuc , $pesos_entid_sucursal);
    $b = generarCodigo($numc, $pesos_num_cuenta);
    /*echo $a." ".$b."<br>";
    echo $entsuc."<br>";
    echo $numc."<br>";*/
    return ($numCuenta == ($entsuc.$a.$b.$numc) );
}

function generarCodigo($num,$pesos){
    $codigo = 0;
    foreach (str_split($num) as $i => $digito) {
        $codigo += $digito * $pesos[$i];
    }

    $codigo = $codigo %11;

    switch ($codigo) {
        case 11: $codigo =0; break;
        case 10: $codigo =1; break;
        default: break;
    }
    
    return $codigo;
}


function elimnarEspacios($numCuenta) {
    return str_replace(" ","",$numCuenta);
}

$mensaje = "";
$numCuenta = "";
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["numCuenta"])) {
    setcookie("numCuenta",$_POST["numCuenta"],3600*10);
    $numCuenta = $_POST["numCuenta"];
    $cuenta =  elimnarEspacios($numCuenta);
    $correcto = codigo_cuenta_correcto($cuenta);

} else {
    if (isset($_COOKIE["numCuenta"])) {
        $numCuenta = $_COOKIE["numCuenta"];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Cuenta</title>
</head>
<body>
    <h1>Validar cuenta Bancaria</h1>
    <p><?=$mensaje?></p>
    <form action="" method="post">
        <label for="numCuenta">Número de cuenta</label>
        <input type="text" name="numCuenta" id="numCuenta" value="<?=$numCuenta?>">
        <input type="submit" value="Validar">
    </form>
    <p>
        <?=(isset($correcto)&&$correcto)?"Cuenta válida":"Cuenta incorrecta"?>
    </p>
</body>
</html>