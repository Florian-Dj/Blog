<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>

    <form class="form-horizontal"  method="post" action="?action=formConnect">
        <fieldset>
            <legend>Espace Administrateur</legend>
            <div class="form-group">
                <label class="col-md-2 control-label" for="username">Identifiant</label>
                <div class="col-md-3">
                    <input name="username" class="form-control input-md" id="username" required="" type="text" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="password">Mot de Passe</label>
                <div class="col-md-3">
                    <input name="password" class="form-control input-md" id="password" required="" type="password" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="submit"></label>
                <div class="col-md-3">
                    <button name="submit" class="btn btn-info" id="submit">Se Connecter</button>
                </div>
            </div>
        </fieldset>
    </form>


<?php
$content = ob_get_clean();
require('template.php');