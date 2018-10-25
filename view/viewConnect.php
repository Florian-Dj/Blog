<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>

    <section id="connect">
    </section>

<?php
$content = ob_get_clean();
require('template.php');