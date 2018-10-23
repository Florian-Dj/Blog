<?php
$title = 'Jean Forteroche | Acteur et Ecrivain';
ob_start();
?>

<section id="home">
    <h2>Billet simple pour l'Alaska</h2>
    <img src="alaska.jpg">
    <div id="posts_frame">
            <?php
            while ($data = $req->fetch()) {
                ?>
                <div class="post_unique">
                    <h3><a href="?action=post&post=<?=$data['id']?>"><?= htmlspecialchars($data['title']) ?></a></h3>
                    <p>
                        Auteur: <?= htmlspecialchars($data['author'])?><br />
                        Publier le: <?= htmlspecialchars($data['date_create'])?> et mise à jour le: <?= htmlspecialchars($data['date_update'])?><br />
                        <?= htmlspecialchars(substr($data['text'],0,120)) . " ...";?>
                    </p>
                </div>
                <?php
            }
            ?>
    </div>
</section>

<?php
$req->closeCursor();
$content = ob_get_clean();
require('template.php');