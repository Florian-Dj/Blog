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
                        echo '<a href="?action=updatePost&post=' . $data['post_id'] . '"><button>Editer Post</button></a>';
                        echo '<a href="?action=deletePost&post=' . $data['post_id'] . '"><button>Supprimer Post</button></a>';
                    }
                    ?>
                </p>
            </div>
            <?php
        }
        if (!empty($_SESSION['username'])) {
            echo '<br/><a href="?action=add_post"><button>Ajouter un Post</button></a>';
        }
        ?>
    </section>

<?php
$posts->closeCursor();
$content = ob_get_clean();
require('template.php');