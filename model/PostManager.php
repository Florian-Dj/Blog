<?php

class PostManager
{

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


    private function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'clavier');
            return $db;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}