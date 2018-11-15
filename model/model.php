<?php

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