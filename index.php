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
            case 'add_post':
                addPost();
                break;
            case 'form_add_post':
                formAddPost($_POST['title_post'], $_SESSION['username'], $_POST['text_post']);
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

            case 'addComment':
                if (isset($_GET['post']) && $_GET['post'] > 0){
                    if (!empty($_POST['username']) && !empty($_POST['text_comment'])) {
                        addComment($_GET['post'], $_POST['username'], $_POST['text_comment']);
                    }
                    else{
                        echo "Erreur : tous les champs ne sont pas remplis !";
                    }
                }
                else{
                    echo "Erreur : aucun identifiant de billet envoyé";
                }
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

            case 'connect':
                connect();
                break;
            case 'form_connect':
                form_connect();
                break;
            case 'disconnect':
                disconnect();
                break;
        }
    }
    else {
        index();
    }