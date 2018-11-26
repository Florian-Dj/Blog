<?php
$title = 'J.Forteroche | Signaler';
ob_start();
?>

<section id="post">
    <h3>Commentaires</h3>

    <?php
    /*
         echo '<p>Auteur : ' . $report['username'] . '<em>Publier le : ' . $report['date_create'] . '</em><br />';
         echo $report['text'] . '<br />';
    */
     ?>

    <form class="form-horizontal" method="post" action="?action=form_report&post=<?=$_GET['post']?>&comment=<?=$_GET['comment']?>">
        <fieldset>
            <legend>Envoyer Signalement</legend>
            <div class="form-group">
                <label class="col-md-2 control-label" for="username_report">Nom</label>
                <div class="col-md-3">
                    <input name="username_report" class="form-control input-md" id="username_report" required="" type="text" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="text_report">Texte Signalement</label>
                <div class="col-md-5">
                    <textarea name="text_report" class="form-control" rows="6" id="text_report"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button name="submit" class="btn btn-warning" id="submit"><span class="glyphicon glyphicon-exclamation-sign"></span> Envoyer Signalement</button>
                </div>
            </div>
        </fieldset>
    </form>

</section>

<?php
$content = ob_get_clean();
require('template.php');