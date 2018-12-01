<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>
    <section class="col-lg-6 col-lg-offset-2">
        <form class="form-horizontal" method="post" action="?action=formConnect">
            <fieldset>
                <legend>Espace Administrateur</legend>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Identifiant :</label>
                    <div class="col-md-5">
                        <input name="username" class="form-control input-md" id="username" required="" type="text" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Mot de Passe :</label>
                    <div class="col-md-5">
                        <input name="password" class="form-control input-md" id="password" required="" type="password" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="submit"></label>
                    <div class="col-md-3">
                        <button name="submit" class="btn btn-info" id="submit">Se Connecter</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
<?php
$content = ob_get_clean();
require('template.php');