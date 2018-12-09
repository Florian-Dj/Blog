<?php
    session_start();

    require('controller/PostController.php');
    require('controller/CommentController.php');
    require('controller/ReportController.php');
    require('controller/AdminController.php');

    $postsController = new \OpenClassRoom\Blog\Controller\PostController();
    $commentController = new \OpenClassRoom\Blog\Controller\CommentController();
    $reportController = new \OpenClassRoom\Blog\Controller\ReportController();
    $adminController = new \OpenClassRoom\Blog\Controller\AdminController();

    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
            case 'index':
                $postsController->index();
                break;

            case 'post':
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    $postsController->post($_GET['post']);
                }
                else {
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;
            case 'posts':
                $postsController->posts();
                break;
            case 'add_post':
                $postsController->addPost();
                break;
            case 'formAddPost':
                if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                    $postsController->formAddPost($_POST['title_post'], $_SESSION['username'], nl2br($_POST['text_post']));
                }
                else{
                    echo "Erreur : Tous les champs ne sont pas remplis !";
                }
                break;
            case 'deletePost':
                if (isset($_GET['post']) && $_GET['post'] > 0){
                    $postsController->deletePost($_GET['post']);
                }
                else{
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;
            case 'updatePost':
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    $postsController->updatePost($_GET['post']);
                }
                else{
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;
            case 'formUpdatePost':
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                        $postsController->formUpdatePost($_GET['post'], $_POST['title_post'], $_POST['text_post']);
                    }
                    else{
                        echo "Erreur : Tous les champs ne sont pas remplis !";
                    }
                }
                else{
                    echo 'Erreur : Aucun identifiant de post envoyé';
                }
                break;

            /*Gestion des Commentaires*/
            case 'addComment':
                if (isset($_GET['post']) && $_GET['post'] > 0){
                    if (!empty($_POST['username']) && !empty($_POST['text_comment'])) {
                        $commentController->addComment($_GET['post'], $_POST['username'], nl2br($_POST['text_comment']));
                    }
                    else{
                        echo "Erreur : Tous les champs ne sont pas remplis !";
                    }
                }
                else{
                    echo "Erreur : Aucun identifiant de billet envoyé";
                }
                break;
            case 'deleteComment':
                if (isset($_GET['post']) && $_GET['post'] > 0 && isset($_GET['comment']) && $_GET['comment'] > 0){
                    $commentController->deleteComment($_GET['post'], $_GET['comment']);
                    break;
                }
                else{
                    echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
                }
                break;

            /*Gestion des Repports*/
            case 'report_comment':
                if (isset($_GET['post']) && $_GET['post'] > 0 && isset($_GET['comment']) && $_GET['comment'] > 0 ){
                    $reportController->formReport($_GET['comment']);
                }
                else{
                    echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
                }
                break;
            case 'form_report':
                if (isset($_GET['post']) && isset($_GET['comment'])){
                    if (!empty($_POST['username_report']) && !empty($_POST['text_report'])){
                        $reportController->addReport($_GET['post'], $_GET['comment'], $_POST['username_report'], $_POST['text_report']);
                        break;
                    }
                    else{
                        echo "Erreur : Tous les champs ne sont pas remplis !";
                    }
                }
                else{
                    echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
                }
                break;

            /*Gestion Management*/
            case 'management':
                $adminController->management();
                break;
            case  'report_management':
                if (isset($_GET['status']) && isset($_GET['report_id']) && $_GET['report_id'] > 0 && isset($_GET['comment_id']) && $_GET['comment_id'] > 0){
                    $adminController->managementReport($_GET['status'], $_GET['report_id'], $_GET['comment_id']);
                }
                else{
                    echo 'Erreur : Aucun status de repport envoyé';
                }
                break;

            /*Gestion de Connexion*/
            case 'connect':
                $adminController->connect();
                break;
            case 'formConnect':
                if (!empty($_POST['username']) && !empty($_POST['password'])){
                    $adminController->formConnect();
                }
                else{
                    echo "Erreur : Tous les champs ne sont pas remplis !";
                }
                break;
            case 'disconnect':
                $adminController->disconnect();
                break;
        }
    }
    else {
        $postsController->index();
    }