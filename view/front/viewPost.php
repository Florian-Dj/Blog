<?php
$title = 'J.Forteroche | ' . $posts['title'];
ob_start();
?>

<section id="post">
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
        echo '<a href="?action=report_comment&post=' . $posts['post_id'] . '&comment=' . $comment['comment_id'] . '"><button>Signaler</button></a><br>';
        if (!empty($_SESSION['username'])) {
            echo '<a href="?action=deleteComment&post=' .$posts['post_id'] . '&comment=' . $comment['comment_id'] . '"><button>Supprimer le commentaire</button></a>';
        }
    }
    ?>

    <div id="comment_add">
        <form method="post" action="?action=addComment&post=<?= $_GET['post']?>">
            <p><label for="username">Nom</label> <input type="text" name="username" id="username"></p>
            <p><label for="text_comment">Texte</label> <textarea name="text_comment" id="text_comment"></textarea></p><br>
            <input type="submit" value="Ajouter Commentaire">
        </form>
    </div>
</section>

<?php
$comments->closeCursor();
$content = ob_get_clean();
require('template.php');