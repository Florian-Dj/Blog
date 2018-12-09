<?php
$title = 'J.Forteroche | Signaler';
ob_start();
?>

<section id="post" class="row">
    <div class="col-lg-6 col-lg-offset-1">
        <h4>Commentaires</h4>
        <?php
        $comment = $comments->fetch();
        echo '<p><em>Auteur : ' . $comment['username'] . '<br/>Publier le :' . $comment['date_create'] . '</em></p>';
        echo '<p class="comment_text">' . $comment['text'] . '</p>';
        ?>
    </div>

    <form class="form-horizontal col-lg-5 col-lg-offset-1 form_report" method="post" action="?action=form_report&post=<?=$_GET['post']?>&comment=<?=$_GET['comment']?>">
        <fieldset>
            <legend>Envoyer Signalement</legend>
            <div class="form-group">
                <label class="col-md-4 control-label" for="username_report">Nom :</label>
                <div class="col-md-8">
                    <input name="username_report" class="form-control input-md" id="username_report" required="" type="text" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="text_report">Texte Signalement :</label>
                <div class="col-md-8">
                    <textarea name="text_report" class="form-control" rows="4" id="text_report"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
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