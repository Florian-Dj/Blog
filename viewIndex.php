<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jean Forteroche | Acteur et Ecrivain</title>
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>
        <?php include 'header.php' ?>
        <section id="home">
            <h2>Billet simple pour l'Alaska</h2>
            <img src="alaska.jpg">
            <div id="episode_cadre">
                <section id="episode">
                    <?php
                    while ($data = $req->fetch()) {
                        ?>
                        <div class="episode_num">
                            <h3><a href="post.php?post=<?=$data['id']?>"><?= htmlspecialchars($data['title']) ?></a></h3>
                            <p>
                                Auteur: <?= htmlspecialchars($data['author'])?><br />
                                Publier le: <?= htmlspecialchars($data['date_create'])?> et mise à jour le: <?= htmlspecialchars($data['date_update'])?><br />
                                <?= htmlspecialchars($data['text']) ?>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
            </div>
        </section>
    </body>
</html>