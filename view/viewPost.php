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
        </p>♥
    </div>


    <h3>Commentaires</h3>
    <?php
    while ($comment = $comments->fetch())
    {
        echo '<p>Auteur : ' . $comment['username'] . ' <em>Publier le :' . $comment['date_create'] . "</em><br>" . $comment['text'] . '<br> <a href=""><button>Signaler</button></a><br>';
        if (!empty($_SESSION['identifiant'])) {
            echo '<a href="sup_commentaire.php?commentaire=' . $comment['id'] . '"><button>Supprimer le commentaire</button></a>';
        }
    }
    ?>

    <div id="comment_add">
        <form method="post" action="trait_com.php?episode=<?= $_GET['post']?>">
            <p><label for="pseudo">Nom</label> <input type="text" name="pseudo" id="pseudo"></p>
            <p><label for="text">Texte</label> <textarea name="text" id="text"></textarea></p><br>
            <input type="submit" value="Ajouter Commentaire">
        </form>
    </div>
</section>

<?php
$comments->closeCursor();
$content = ob_get_clean();
require('template.php');