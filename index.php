<?php
session_start();

use OpenClassRoom\Blog\Controller\AdminController;
use OpenClassRoom\Blog\Controller\CommentController;
use OpenClassRoom\Blog\Controller\PostController;
use OpenClassRoom\Blog\Controller\ReportController;

require('controller/PostController.php');
require('controller/CommentController.php');
require('controller/ReportController.php');
require('controller/AdminController.php');

$posts_control = new PostController();
$comment_control = new CommentController();
$report_control = new ReportController();
$admin_control = new AdminController();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'index':
            $posts_control->index();
            break;

        case 'post':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                $posts_control->post($_GET['post']);
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;
        case 'posts':
            $posts_control->posts();
            break;
        case 'add_post':
            $posts_control->addPost();
            break;
        case 'formAddPost':
            if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                $posts_control->formAddPost($_POST['title_post'], $_SESSION['username'], nl2br($_POST['text_post']));
            } else {
                echo "Erreur : Tous les champs ne sont pas remplis !";
            }
            break;
        case 'deletePost':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                $posts_control->deletePost($_GET['post']);
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;
        case 'updatePost':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                $posts_control->updatePost($_GET['post']);
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;
        case 'formUpdatePost':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                if (!empty($_POST['title_post']) && !empty($_POST['text_post'])) {
                    $posts_control->formUpdatePost($_GET['post'], $_POST['title_post'], $_POST['text_post']);
                } else {
                    echo "Erreur : Tous les champs ne sont pas remplis !";
                }
            } else {
                echo 'Erreur : Aucun identifiant de post envoyé';
            }
            break;

        /*Gestion des Commentaires*/
        case 'addComment':
            if (isset($_GET['post']) && $_GET['post'] > 0) {
                if (!empty($_POST['username']) && !empty($_POST['text_comment'])) {
                    $comment_control->addComment($_GET['post'], $_POST['username'], nl2br($_POST['text_comment']));
                } else {
                    echo "Erreur : Tous les champs ne sont pas remplis !";
                }
            } else {
                echo "Erreur : Aucun identifiant de billet envoyé";
            }
            break;
        case 'deleteComment':
            if (isset($_GET['post']) && $_GET['post'] > 0 && isset($_GET['comment']) && $_GET['comment'] > 0) {
                $comment_control->deleteComment($_GET['post'], $_GET['comment']);
                break;
            } else {
                echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
            }
            break;

        /*Gestion des Repports*/
        case 'report_comment':
            if (isset($_GET['post']) && $_GET['post'] > 0 && isset($_GET['comment']) && $_GET['comment'] > 0) {
                $report_control->formReport($_GET['comment']);
            } else {
                echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
            }
            break;
        case 'form_report':
            if (isset($_GET['post']) && isset($_GET['comment'])) {
                if (!empty($_POST['username_report']) && !empty($_POST['text_report'])) {
                    $report_control->addReport($_GET['post'], $_GET['comment'], $_POST['username_report'], $_POST['text_report']);
                    break;
                } else {
                    echo "Erreur : Tous les champs ne sont pas remplis !";
                }
            } else {
                echo 'Erreur : Aucun identifiant de post ou de commentaire envoyé';
            }
            break;

        /*Gestion Management*/
        case 'management':
            $admin_control->management();
            break;
        case  'report_management':
            if (isset($_GET['status']) && isset($_GET['report_id']) && $_GET['report_id'] > 0 && isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                $admin_control->managementReport($_GET['status'], $_GET['report_id'], $_GET['comment_id']);
            } else {
                echo 'Erreur : Aucun status de repport envoyé';
            }
            break;

        /*Gestion de Connexion*/
        case 'connect':
            $admin_control->connect();
            break;
        case 'formConnect':
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $admin_control->formConnect();
            } else {
                echo "Erreur : Tous les champs ne sont pas remplis !";
            }
            break;
        case 'disconnect':
            $admin_control->disconnect();
            break;
    }
} else {
    $posts_control->index();
}