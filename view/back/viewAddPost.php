<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>
    <form class="form-horizontal" method="post" action="?action=formAddPost">
    <fieldset>
        <legend>Ajouter billet</legend>
        <div class="form-group">
            <label class="col-md-2 control-label" for="title_post">Titre Billet</label>
            <div class="col-md-4">
                <input name="title_post" class="form-control input-md" id="title_post" required="" type="text" placeholder="Episode 1">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="text_post">Texte du billet</label>
            <div class="col-md-8">
                <textarea name="text_post" class="form-control" rows="20" id="text_post"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="submit"></label>
            <div class="col-md-4">
                <button name="submit" class="btn btn-primary" id="submit"><span class="glyphicon glyphicon-book"></span> Ajouter Billet</button>
            </div>
        </div>
    </fieldset>
</form>


<?php
$content = ob_get_clean();
require(__DIR__ . '/../front/template.php');