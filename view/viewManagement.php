<?php
$title = 'J.Forteroche | Gestion';
ob_start();
?>

    <section id="post">
        <?php
            while ($report = $management->fetch())
            {
                echo 'Id Post: ' . $report['id_post'] . ' ,Id Commentaire: ' . $report['id_comment'] . ' ,Auteur du signalement: ' . $report['author_report'] .
                    ' ,Texte du signalement: ' . $report['text_report'] . ' ,Date du signalement: ' . $report['date_report'] . ' ,Statut: ' . $report['status'];
            }
        ?>
    </section>

<?php
$content = ob_get_clean();
require('template.php');