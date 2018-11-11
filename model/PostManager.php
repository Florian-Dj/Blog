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

    public function getAddPost($title, $author, $text)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(title, author, text, date_create, date_update) VALUES(?, ?, ?, NOW(), NOW())');
        $affectedLines = $req->execute(array($title, $author, $text));

        return $affectedLines;
    }

    public function getDeletePost($postId)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM post WHERE post_id = ?');
        $post->execute(array($postId));
        $comment = $db->prepare('DELETE FROM comment WHERE post_id = ?');
        $comment->execute(array($postId));
        $report = $db->prepare('DELETE FROM report WHERE post_id = ?');
        $report->execute(array($postId));

        return $post;
    }

    public function getUpdatePost($postId, $postTitle, $postText)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET title = :title, text = :text, date_update = NOW() WHERE post_id = :id');
        $post->execute(array(
            'title' => $postTitle,
            'text' => $postText,
            'id' => $postId,
        ));
        return $post;
    }

}