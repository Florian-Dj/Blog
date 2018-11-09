<?php
    session_start();
    require('controller/controller.php');

    if (isset($_GET['action'])) {

        //Voir pour change if et elseif par switch case♦
        switch ($_GET['action']) {
            case 'index':
                index();
                break;
            case 'post':
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    post();
                }
                else {
                    throw new Exception('Erreur : Aucun identifiant de billet envoyé');
                }
                break;
            case 'posts':
                posts();
                break;
            case 'connect':
                connect();
                break;
            case 'form_connect':
                form_connect();
                break;
            case 'disconnect':
                disconnect();
                break;
            case 'add_post':
                add_post();
                break;
            case 'form_add_post':
                form_add_post();
                break;
            case 'delete_post':
                delete_post();
                break;
            case 'edit_post':
                edit_post();
                break;
            case 'form_edit_post':
                form_edit_post();
                break;
            case 'form_comment':
                form_comment();
                break;
            case 'delete_comment':
                delete_comment();
                break;
            case 'report_comment':
                report_comment();
                break;
            case 'form_report':
                form_report();
                break;
            case 'management':
                management();
                break;
        }
    }
    else {
        index();
    }