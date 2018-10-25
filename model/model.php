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

    function getConnect()
    {
        $db = dbConnect();
        $req = $db->query('SELECT * FROM admin');
        $admin = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $admin['password']);
        if (!$admin){
            echo 'Mauvais  identifiants ou mot de passe ! 1';
        }
        else {
            if ($isPasswordCorrect){
                session_start();
                $_SESSION['username'] = $admin['username'];
                $_SESSION['password'] = $admin['password'];
                header('Location: ./index.php');
            }
            else {
                echo 'Mauvais  identifiant ou mot de passe ! 2';
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