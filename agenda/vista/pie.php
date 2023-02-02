<?php 
function getPie() {
ob_start();
?>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$html = ob_get_contents();
ob_clean();
return $html;
}
  