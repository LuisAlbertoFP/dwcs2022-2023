<?php
//OPERACIONES
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"]== "POST") {
?>
   <p>SOY POST</p>
<?php } else {?>
    <p>SOY UN GET</p>
    <?php } ?>
</body>
</html>