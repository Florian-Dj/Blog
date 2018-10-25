<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>

    <section id="posts">
        <?php
        while ($data = $req->fetch()) {
            ?>
            <div id="posts_frame">
                <h3><a href="?action=post&post=<?=$data['id']?>"><?= htmlspecialchars($data['title']) ?></a></h3>
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
                        echo '<a href="?action=edit_posts&post=' . $data['id'] . '"><button>Editer Episode</button></a>';
                        echo '<a href="?action=delete_posts&post=' . $data['id'] . '"><button>Supprimer Episode</button></a>';
                    }
                    ?>
                </p>
            </div>
            <?php
        }
        ?>
    </section>

<?php
$req->closeCursor();
$content = ob_get_clean();
require('template.php');