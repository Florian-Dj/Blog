<?php
$title = 'J.Forteroche | ' . $posts['title'];
ob_start();
?>

<section class="col-lg-12">
    <div class="post_frame">
        <h3><?= htmlspecialchars($posts['title']) ?></h3>
        <p>
            Auteur: <?= htmlspecialchars($posts['author'])?><br />
            Publier le: <?= htmlspecialchars($posts['date_create'])?> et mise à jour le: <?= htmlspecialchars($posts['date_update'])?><br />
            <?= htmlspecialchars($posts['text']) ?>
        </p>
    </div>

    <h3>Commentaires</h3>
    <?php
    while ($comment = $comments->fetch())
    {
        echo '<p>Auteur : ' . $comment['username'] . ' <em>Publier le :' . $comment['date_create'] . "</em><br />" . $comment['text'] . '<br />';
        echo '<a href="?action=report_comment&post=' . $posts['post_id'] . '&comment=' . $comment['comment_id'] . '" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> Signaler</a><br>';
        if (!empty($_SESSION['username'])) {
            echo '<a href="?action=deleteComment&post=' .$posts['post_id'] . '&comment=' . $comment['comment_id'] . '" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Supprimer commentaire</a>';
        }
    }
    ?>

    <form class="form-horizontal" method="post" action="?action=addComment&post=<?= $_GET['post']?>">
        <fieldset>
            <legend>Ajouter un commentaire</legend>
            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Nom</label>
                <div class="col-md-4">
                    <input name="username" class="form-control input-md" id="username" required="" type="text" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="text_comment">Texte</label>
                <div class="col-md-4">
                    <textarea name="text_comment" class="form-control" id="text_comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button name="submit" class="btn btn-info" id="submit">Ajouter commentaires</button>
                </div>
            </div>
        </fieldset>
    </form>

</section>

<?php
$comments->closeCursor();
$content = ob_get_clean();
require('template.php');