<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jean Forteroche | Episodes</title>
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
        <?php include 'header.php'; ?>
        <section id="episode">
            <div class="episode_num">
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
                echo '<p>Auteur : ' . $comment['username'] . ' <em>Publier le :' . $comment['date_create'] . "</em><br>" . $comment['text'] . '<br> <a href="">Signaler</a><br>';
                if (!empty($_SESSION['identifiant'])) {
                    echo '<a href="sup_commentaire.php?commentaire=' . $comment['id'] . '"><button>Supprimer le commentaire</button></a>';
                }
            }
            ?>

            <div id="commentaires">
                <form method="post" action="trait_com.php?episode=<?= $_GET['post']?>">
                    <p><label for="pseudo">Nom</label> <input type="text" name="pseudo" id="pseudo"></p>
                    <p><label for="text">Texte</label> <textarea name="text" id="text"></textarea></p><br>
                    <input type="submit" value="Ajouter Commentaire">
                </form>
            </div>
        </section>
    </body>
</html>
