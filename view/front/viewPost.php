<?php
$title = 'J.Forteroche | ' . $posts['title'];
ob_start();
?>

    <section class="col-lg-12">
        <div class="post_frame">
            <h3><?= htmlspecialchars($posts['title']) ?></h3>
            <p>Auteur: <?= htmlspecialchars($posts['author'])?></p>
            <p>Publier le: <?= htmlspecialchars($posts['date_create'])?><br />Mise à jour le: <?= htmlspecialchars($posts['date_update'])?></p>
            <p class="col-lg-10 post"><?= ($posts['text']) ?></p>
        </div>

        <div class="col-lg-12 comment_box">
            <h4>Commentaires</h4>
            <div class="comment col-lg-8 col-lg-offset-1">
                <?php
                while ($comment = $comments->fetch())
                {
                    echo '<p><em>Auteur : ' . $comment['username'] . '<br/>Publier le :' . $comment['date_create'] . '</em></p>';
                    echo '<p class="comment_text">' . $comment['text'] . '</p>';
                    echo '<a href="?action=report_comment&post=' . $posts['post_id'] . '&comment=' . $comment['comment_id'] . '" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> Signaler</a>';
                    if (!empty($_SESSION['username'])) {
                        echo '<a href="?action=deleteComment&post=' .$posts['post_id'] . '&comment=' . $comment['comment_id'] . '" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Supprimer commentaire</a>';
                    }
                }
                ?>
            </div>

            <form class="form-horizontal col-lg-6" method="post" action="?action=addComment&post=<?= $_GET['post']?>">
                <fieldset>
                    <legend>Ajouter un commentaire</legend>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="username">Nom :</label>
                        <div class="col-md-8">
                            <input name="username" class="form-control input-md" id="username" required="" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="text_comment">Texte :</label>
                        <div class="col-md-8">
                            <textarea name="text_comment" class="form-control" rows="5" id="text_comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button name="submit" class="btn btn-info" id="submit"><span class="glyphicon glyphicon-bullhorn"></span> Ajouter commentaires</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>

<?php
$comments->closeCursor();
$content = ob_get_clean();
require('template.php');