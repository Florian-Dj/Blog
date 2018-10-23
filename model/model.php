<?php
function getPostsIndex()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM post ORDER BY date_create DESC LIMIT 0,4');
    return $req;
}

function getPosts($postId)
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