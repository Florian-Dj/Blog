<?php
$title = 'J.Forteroche | Signaler';
ob_start();
?>

<section id="post">
    <h3>Commentaires</h3>
    <?php
         echo '<p>Auteur : ' . $report['username'] . ' <em>Publier le :' . $report['date_create'] . '</em><br />';
         echo $report['text'] . '<br />';
     ?>

    <form method="post" action="?action=form_report&post=<?=$_GET['post']?>&comment=<?=$_GET['comment']?>">
        <p><label for="username_report">Nom</label> : <input type="text" name="username_report" id="username_report"></p>
        <p><label for="text_report">Texte du signalement</label> : <textarea name="text_report" id="text_report"></textarea></p>
        <input type="submit" value="Envoyer">
    </form>
</section>

<?php
$content = ob_get_clean();
require('template.php');