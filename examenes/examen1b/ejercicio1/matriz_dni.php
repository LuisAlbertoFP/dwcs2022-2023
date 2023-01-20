<?php

use PhpParser\Node\Stmt\TryCatch;

require_once("funciones.php");
session_start();
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["fc"])) {
    try {
       $_SESSION["fc"] = $_POST["fc"];
       $numFilasColumnas =  validarEntrada($_POST["fc"]);
       $matriz = generarTablaDNIs($numFilasColumnas);
    }
    catch (Exception $e) {
        $mensaje = $e->getMessage();
    }

    
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz DNIs</title>
</head>
<body>
    <h1>Matriz DNIs</h1>
    <p><?=$mensaje?></p>
    <form action="" method="post">
        <label for="fc">Filas,columnas</label>
        <input type="text" name="fc" id="fc" value="<?=(isset($_SESSION["fc"]))?$_SESSION["fc"]:""?>">
        <input type="submit" value="Calcular">
    </form>

    <h2>Resultado</h2>
    <pre><?php
            if (isset($matriz)) {
                foreach ($matriz as $fila) { ?>
                    <?= implode(" ", $fila). "\n"?>
                <?php 
                }
?>


<?php           
                $matriz2  = matriz2($matriz);
                foreach ($matriz2 as $fila) {
                    echo implode(" ", $fila). "\n";
                }
            }
    ?></pre>
    
</body>
</html>