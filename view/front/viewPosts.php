<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>

    <section id="posts">
        <?php
        while ($data = $posts->fetch()) {
            ?>
            <div id="posts_frame">
                <h3><a href="?action=post&post=<?=$data['post_id']?>"><?= htmlspecialchars($data['title']) ?></a></h3>
                <p>
                    Auteur: <?= htmlspecialchars($data['author'])?><br />
                    Publier le: <?= htmlspecialchars($data['date_create'])?> et mise à jour le: <?= htmlspecialchars($data['date_update'])?><br />
                    <?php
                    if (strlen($data['text']) > 120) {
                        echo htmlspecialchars(substr($data['text'], 0, 150)) . "...<br />";
                    }
                    else{
                        echo htmlspecialchars($data['text']) . "<br />";
                    }
                    if (!empty($_SESSION['username'])) {
                        echo '<a href="?action=updatePost&post=' . $data['post_id'] . '" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span> Editer Post</a>';
                        echo '<a href="?action=deletePost&post=' . $data['post_id'] . '" class="btn btn-sm btn-danger">Supprimer Post <span class="glyphicon glyphicon-remove-sign"></span></a>';
                    }
                    ?>
                </p>
            </div>
            <?php
        }
        if (!empty($_SESSION['username'])) {
            echo '<br/><a href="?action=add_post" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-book"></span> Ajouter Post</a>';
        }
        ?>
    </section>

<?php
$posts->closeCursor();
$content = ob_get_clean();
require('template.php');