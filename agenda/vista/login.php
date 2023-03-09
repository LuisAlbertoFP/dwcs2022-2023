<?php 
function getLogin($mensaje=null,$correo="") {
ob_start();
?>
<div class="gfg-box">
<div class="card "  style="width: 32rem;">
<h2>Entrar en agenda</h2>
<div class="card-body" id="login">
<?php
if (!is_null($mensaje)) {
?>
<div class="alert alert-danger" role="alert"><?=$mensaje?></div>
<?php } ?>
<form action="" method="post"  class="mb-3">
<div class="mb-3">
    <label for="correo">Correo:</label>
    <input type="text" name="correo" id="correo" required value="<?=$correo?>">
</div>
<div class="mb-3">    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"  required>
</div>    
    <input type="submit" value="Entrar"  class="btn btn-primary">
</form>
</div>
</div>
</div>
<?php
$html = ob_get_contents();
ob_clean();
return $html;
}
