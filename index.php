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
                    post($_GET['post']);
                }
                else {
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;
            case 'posts':
                posts();
                break;
            case 'add_post':
                addPost();
                break;
            case 'formAddPost':
                if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                    formAddPost($_POST['title_post'], $_SESSION['username'], $_POST['text_post']);
                }
                else{
                    echo "Erreur : tous les champs ne sont pas remplis !";
                }
                break;
            case 'deletePost':
                if (isset($_GET['post']) && $_GET['post'] > 0){
                    deletePost($_GET['post']);
                }
                else{
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;
            case 'updatePost':
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    updatePost($_GET['post']);
                }
                else{
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;
            case 'formUpdatePost':
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                        formUpdatePost($_GET['post'], $_POST['title_post'], $_POST['text_post']);
                    }
                    else{
                        echo "Erreur : tous les champs ne sont pas remplis !";
                    }
                }
                else{
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
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
            case 'deleteComment':
                if (isset($_GET['post']) && $_GET['post'] > 0 && isset($_GET['comment']) && $_GET['comment'] > 0){
                    deleteComment($_GET['post'], $_GET['comment']);
                }
                else{
                    echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
                }
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