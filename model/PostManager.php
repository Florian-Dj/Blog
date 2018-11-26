<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class PostManager extends Manager
{
    private $_postId;
    private $_title;
    private $_author;
    private $_text;

    //Hydrate
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //List getters
    public function id()
    {
        return $this->_postId;
    }

    public function title()
    {
        return $this->_title;
    }

    public function author()
    {
        return $this->_author;
    }

    public function text()
    {
        return $this->_text;
    }

    //List setters
    public function setId($postId)
    {
        $postId = (int)$postId;
        if ($postId > 0) {
            $this->_postId = $postId;
        }
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }

    public function setText($text)
    {
        if (is_string($text)) {
            $this->_text = $text;
        }
    }

    //Call SQL
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

        return $post;
    }

    public function getUpdatePost($postId, $title, $text)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE post SET title = :title, text = :text, date_update = NOW() WHERE post_id = :id');
        $post->execute(array(
            'title' => $title,
            'text' => $text,
            'id' => $postId,
        ));
        return $post;
    }

}