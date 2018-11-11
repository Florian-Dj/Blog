<?php
$title = 'J.Forteroche | Edit Post';
ob_start();
?>

    <section id="posts">
        <form method="post" action="?action=form_edit_post&post=<?=$posts['post_id']?>">
            <p><label for="title_post">Titres Episode</label> : <input type="text" value="<?= $posts['title'] ?>"  name="title_post" id="title_post"></p>
            <p><label for="text_post">Texte de l'episode</label> : <textarea name="text_post" id="text_post"><?= $posts['text'] ?>"</textarea></p><br>
            <input type="submit" value="Editer Episode">
        </form>
    </section>

<?php
$content = ob_get_clean();
require('template.php');