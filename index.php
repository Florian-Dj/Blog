<?php
    require('controller/controller.php');

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'index') {
            index();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                post();
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    }
    else {
        index();
    }