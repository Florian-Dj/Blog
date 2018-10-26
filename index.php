<?php
    session_start();
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
        elseif ($_GET['action'] == 'form_connect'){
            form_connect();
        }
        elseif ($_GET['action'] == 'disconnect'){
            disconnect();
        }
        elseif ($_GET['action'] == 'add_post'){
            add_post();
        }
        elseif ($_GET['action'] == 'form_add_post'){
            form_add_post();
        }
        elseif ($_GET['action'] == 'delete_post'){
            delete_post();
        }
        elseif ($_GET['action'] == 'edit_post'){
            edit_post();
        }
        elseif ($_GET['action'] == 'form_edit_post'){
            form_edit_post();
        }
    }
    else {
        index();
    }