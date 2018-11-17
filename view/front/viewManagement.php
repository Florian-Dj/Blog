<?php
$title = 'J.Forteroche | Repport';
ob_start();
?>



<?php
$management->closeCursor();
$management = ob_get_clean();
require('template.php');