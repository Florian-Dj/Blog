<?php
$title = 'J.Forteroche | Gestion';
ob_start();
?>

    <section id="post">
        <?php
            while ($report = $reports->fetch())
            {
                echo 'Id Post: ' . $report['post_id'] . ' ,Id Commentaire: ' . $report['comment_id'] . ' ,Auteur du signalement: ' . $report['author_report'] .
                    ' ,Texte du signalement: ' . $report['text_report'] . ' ,Date du signalement: ' . $report['date_report'];
            }
        ?>
    </section>

<?php
$reports->closeCursor();
$content = ob_get_clean();
require('./view/front/template.php');