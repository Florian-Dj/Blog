<?php
    function getPostsIndex()
    {
        $db = dbConnect();
        $req = $db->query('SELECT * FROM post ORDER BY date_create DESC LIMIT 0,2');
        return $req;
    }

    function getPosts()
    {
        $db = dbConnect();
        $req = $db->query('SELECT * FROM post');
        return $req;
    }

    function getPost($postId)
    {
        $db = dbConnect();
        $req = $db->prepare('SELECT * FROM post WHERE id = ?');
        $req->execute(array($postId));
        $posts = $req->fetch();
        return $posts;
    }

    function getComment($postId)
    {
        $db = dbConnect();
        $comments = $db->prepare('SELECT * FROM comment WHERE post_id = ? ORDER BY date_create DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    function getAddPost()
    {
        $db = dbConnect();
        $req = $db->prepare('INSERT INTO post(author, title, text, date_create, date_update) VALUES(:author, :title, :text, NOW(), NOW())');
        $req->execute(array(
            'author' => $_SESSION['username'],
            'title' => $_POST['title_post'],
            'text' => $_POST['text_post'],
        ));
        header('Location: ?action=posts');
        return $req;
    }

    function getDelPost()
    {
        $db = dbConnect();
        $post = $db->prepare('DELETE FROM post WHERE id = ?');
        $post->execute(array($_GET['post']));
        $comment = $db->prepare('DELETE FROM comment WHERE post_id = ?');
        $comment->execute(array($_GET['post']));
        $report = $db->prepare('DELETE FROM report WHERE id_post = ?');
        $report->execute(array($_GET['post']));
        header('Location: ?action=posts');
        return $post;
    }

    function getEditPost()
    {
        $db = dbConnect();
        $post = $db->prepare('UPDATE post SET title = :title, text = :text, date_update = NOW() WHERE id = :id');
        $post->execute(array(
            'title' => $_POST['title_post'],
            'text' => $_POST['text_post'],
            'id' => $_GET['post'],
        ));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $post;
    }

    function getAddComment()
    {
        $db = dbConnect();
        $comment = $db->prepare('INSERT INTO comment(username, post_id, text, date_create) VALUES(:username, :post_id, :text, NOW())');
        $comment->execute(array(
            'username' => $_POST['username'],
            'post_id' => $_GET['post'],
            'text' => $_POST['text_comment'],
        ));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $comment;
    }

    function getDelComment()
    {
        $db = dbConnect();
        $comment = $db->prepare('DELETE FROM comment WHERE id = ?');
        $comment->execute(array($_GET['comment']));
        $report = $db->prepare('DELETE FROM report WHERE id_post = ?');
        $report->execute(array($_GET['post']));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $comment;
    }

    function getFormReportComment($commentId)
    {
        $db = dbConnect();
        $comment = $db->prepare('SELECT * FROM comment WHERE id = ?');
        $comment->execute(array($commentId));
        return $comment->fetch();
    }

    function getReportComment()
    {
        $db = dbConnect();
        $comment = $db->prepare('INSERT INTO report(id_post, id_comment, author_report, text_report, date_report, status) VALUES(:id_post, :id_comment, :author_report, :text_report, NOW(), :status)');
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