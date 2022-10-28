<?php
    $color = "#ff0000";
    $counter = 0;
    if(!isset($_COOKIE["counter"])){
        setcookie("counter", $counter);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_COOKIE["color"]) && $_COOKIE["color"] != $_POST["color"])){
        $counter = $_COOKIE["counter"] + 1;
        setcookie("counter", $_COOKIE["counter"]+1);
    }
    else{
        $counter = $_COOKIE["counter"];
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["color"])){
        setcookie("color", $_POST["color"], time()+3600);
        $color = $_POST["color"];
    }
    else if(isset($_COOKIE["color"])){
        $color = $_COOKIE["color"];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Color de fondo</title>
    <style>
        body{
            background-color: <?=$color?>;
        }
        div{
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <div>
        Ha usted cambiado de color <?=$counter?> veces
    </div>
    <form action="./index.php" method="post">
        <input type="color" value="<?=$color?>" name="color" id="color">
        <input type="submit" value="submit">
    </form>
</body>
</html>