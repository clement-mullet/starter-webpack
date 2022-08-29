<?php
ob_start();
global $router;
?>




<?php $content = ob_get_clean(); ?>

<?php require('public/pages/index.php'); ?>