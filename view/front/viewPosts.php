<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>

    <section id="posts" class="row">
        <div class="col-lg-12">
            <?php
            while ($data = $posts->fetch()) {
                ?>
                <div id="posts_frame" class="col-lg-10">
                    <h3><?= htmlspecialchars($data['title']) ?></h3>
                    <p class="author">
                        Auteur: <?= htmlspecialchars($data['author'])?><br />
                        Publier le: <?= htmlspecialchars($data['date_create'])?><br />
                    </p>
                    <p>
                        <?php
                        if (strlen($data['text']) > 350) {
                            echo (substr($data['text'], 0, 350)) . "...<br />";
                        }
                        else{
                            echo ($data['text']) . "<br />";
                        }
                        ?>
                    </p>
                        <?php
                        if (!empty($_SESSION['username'])) {
                            echo '<a href="?action=updatePost&post=' . $data['post_id'] . '" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span> Editer Post</a>';
                            echo '<a href="?action=deletePost&post=' . $data['post_id'] . '" class="btn btn-sm btn-danger">Supprimer Post <span class="glyphicon glyphicon-remove-sign"></span></a>';
                        }
                        ?>
                    <a href="?action=post&post=<?=$data['post_id']?>" class="btn btn-lg btn-default">Lire la suite</a>
                    </p>
                </div>
                <?php
            }?>
        </div>
        <?php
            if (!empty($_SESSION['username'])) {
                echo '<div class="col-lg-offset-2 col-lg-4 add_post"><a href="?action=add_post" class="btn btn-sm btn-primary col-lg-4"><span class="glyphicon glyphicon-book"></span> Ajouter Post</a></div>';
            }
            ?>
    </section>

<?php
$posts->closeCursor();
$content = ob_get_clean();
require('template.php');