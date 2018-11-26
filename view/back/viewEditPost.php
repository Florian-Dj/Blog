<?php
$title = 'J.Forteroche | Edit Post';
ob_start();
?>
        <form class="form-horizontal" method="post" action="?action=formUpdatePost&post=<?=$posts['post_id']?>">
            <fieldset>
                <legend>Editer billet</legend>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="title_post">Titre Billet</label>
                    <div class="col-md-4">
                        <input name="title_post" class="form-control input-md" id="title_post" required="" type="text" placeholder="Episode 1" value="<?= $posts['title'] ?>">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="text_post">Texte du billet</label>
                    <div class="col-md-8">
                        <textarea name="text_post" class="form-control" rows="25" id="text_post"><?= $posts['text'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button name="submit" class="btn btn-success" id="submit">Editer Billet</button>
                    </div>
                </div>
            </fieldset>
        </form>


<?php
$content = ob_get_clean();
require('./view/front/template.php');