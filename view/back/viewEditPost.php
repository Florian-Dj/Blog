<?php
$title = 'J.Forteroche | Edit Post';
ob_start();
?>
    <section class="col-lg-10 col-lg-offset-1">
        <form class="form-horizontal" method="post" action="?action=formUpdatePost&post=<?=$posts['post_id']?>">
            <fieldset>
                <legend>Editer billet</legend>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="title_post">Titre Billet :</label>
                    <div class="col-md-4">
                        <input name="title_post" class="form-control input-md" id="title_post" required="" type="text" placeholder="Episode 1" value="<?= $posts['title'] ?>">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="text_post">Texte du billet :</label>
                    <div class="col-md-9">
                        <textarea name="text_post" class="form-control" rows="25" id="text_post"><?= $posts['text'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="submit"></label>
                    <div class="col-md-4">
                        <button name="submit" class="btn btn-success" id="submit"><span class="glyphicon glyphicon-edit"></span> Editer Billet</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
<?php
$content = ob_get_clean();
require(__DIR__ . '/../front/template.php');