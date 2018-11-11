<?php

    function getEditPost()
    {
        $db = dbConnect();
        $post = $db->prepare('UPDATE post SET title = :title, text = :text, date_update = NOW() WHERE post_id = :id');
        $post->execute(array(
            'title' => $_POST['title_post'],
            'text' => $_POST['text_post'],
            'id' => $_GET['post'],
        ));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $post;
    }

    function getDelComment()
    {
        $db = dbConnect();
        $comment = $db->prepare('DELETE FROM comment WHERE comment_id = ?');
        $comment->execute(array($_GET['comment']));
        $report = $db->prepare('DELETE FROM report WHERE post_id = ?');
        $report->execute(array($_GET['post']));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $comment;
    }

    function getFormReportComment($commentId)
    {
        $db = dbConnect();
        $comment = $db->prepare('SELECT * FROM comment WHERE comment_id = ?');
        $comment->execute(array($commentId));
        return $comment->fetch();
    }

    function getReportComment()
    {
        $db = dbConnect();
        $comment = $db->prepare('INSERT INTO report(post_id, comment_id, author_report, text_report, date_report, status) VALUES(:id_post, :id_comment, :author_report, :text_report, NOW(), :status)');
        $comment->execute(array(
            'id_post' => $_GET['post'],
            'id_comment' => $_GET['comment'],
            'author_report' => $_POST['username_report'],
            'text_report' => $_POST['text_report'],
            'status' => 'En étude',
        ));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $comment;

    }

    function getManagement()
    {
        $db = dbConnect();
        $management = $db->prepare('SELECT * FROM report');
        $management->execute(array());
        return $management;
    }

    function getConnect()
    {
        $db = dbConnect();
        $req = $db->query('SELECT * FROM admin');
        $admin = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $admin['password']);
        if (!$admin){
            echo 'Mauvais  identifiant ou mot de passe';
        }
        else {
            if ($isPasswordCorrect){
                session_start();
                $_SESSION['username'] = $admin['username'];
                $_SESSION['password'] = $admin['password'];
                header('Location: ./index.php');
            }
            else {
                echo 'Mauvais  identifiant ou mot de passe';
            }
        }
        return $admin;
    }

    function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'clavier');
            return $db;
        }

        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }