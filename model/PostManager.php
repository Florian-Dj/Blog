<?php

namespace OpenClassRoom\Blog\Model;

require_once('./model/Manager.php');

class PostManager extends Manager
{

    public function getPostsIndex()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM post ORDER BY date_create DESC LIMIT 0,2');

        return $req;
    }

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM post ORDER BY post_id');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM post WHERE post_id = ?');
        $req->execute(array($postId));
        $posts = $req->fetch();

        return $posts;
    }

    function getAddPost($title, $author, $text)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(title, author, text, date_create, date_update) VALUES(?, ?, ?, ?, NOW(), NOW())');
        $affectedLines = $req->execute(array($title, $author, $text));

        return $affectedLines;
    }
}