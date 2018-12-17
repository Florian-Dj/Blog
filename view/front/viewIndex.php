<?php
$title = 'J.Forteroche | Acteur et Ecrivain';
ob_start();
?>

<section id="home" class="row">
    <h2 class="hidden-xs">Billet simple pour l'Alaska</h2>
    <img class="col-sm-12 hidden-xs" src="./public/images/alaska.jpg">
    <div id="posts_frame" class="col-lg-12">
        <hr/>
        <h2>Derniers Billets</h2>
            <?php
            while ($data = $req->fetch()) {
                ?>
                <div class="col-lg-4 col-lg-offset-1 post_unique">
                    <h3><a href="?action=post&post=<?=$data['post_id']?>"><?= htmlspecialchars($data['title']) ?></a></h3>
                    <p>
                        <i>
                        Auteur: <?= htmlspecialchars($data['author'])?><br />
                        Publier: <?= htmlspecialchars($data['date_create'])?><br />
                        Mise à jour: <?= htmlspecialchars($data['date_update'])?><br />
                        </i>
                    </p>
                    <p>
                    <?php
                        if (strlen($data['text']) > 350) {
                            echo (substr($data['text'], 0, 350)) . "...";
                        }
                        else{
                            echo ($data['text']);
                        }
                    ?>
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