<?php
$title = 'J.Forteroche | Posts';
ob_start();
?>

    <section id="connect">
        <div id="form_connect">
            <form method="post" action="?action=form_connect">
                <p><label for="username">Identifiant</label> : <input type="text" name="username" id="username"></p>
                <p><label for="password">Mot de passe</label> : <input type="password" name="password" id="password"></p><br>
                <input type="submit" value="Se connecter">
            </form>
        </div>
    </section>

<?php
$content = ob_get_clean();
require('template.php');