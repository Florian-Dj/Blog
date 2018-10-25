<?php
    require('controller/controller.php');

    if (isset($_GET['action'])) {

        //Voir pour change if et elseif par switch case♦
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
        elseif ($_GET['action'] == 'posts'){
            posts();
        }
        elseif ($_GET['action'] == 'connect'){
            connect();
        }
    }
    else {
        index();
    }