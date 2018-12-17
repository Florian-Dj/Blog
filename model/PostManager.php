<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class PostManager extends Manager
{
    private $_post_id;
    private $_title;
    private $_author;
    private $_text;

    //Constructor
    /*
    public function __construct($_postId, $_title, $_author, $_text)
    {
        $this->_postId = $_postId;
        $this->_title = $_title;
        $this->_author = $_author;
        $this->_text = $_text;
    }*/

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
        return $this->_post_id;
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
    public function setId($post_id)
    {
        $post_id = (int)$post_id;
        if ($post_id > 0) {
            $this->_post_id = $post_id;
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
        $data_base = $this->dbConnect();
        $request = $data_base->query('SELECT * FROM post ORDER BY date_create DESC LIMIT 0,2');

        return $request;
    }

    public function getPosts()
    {
        $data_base = $this->dbConnect();
        $request = $data_base->query('SELECT * FROM post ORDER BY post_id');

        return $request;
    }

    public function getPost($postId)
    {
        $data_base = $this->dbConnect();
        $request = $data_base->prepare('SELECT * FROM post WHERE post_id = ?');
        $request->execute(array($postId));
        $posts = $request->fetch();

        return $posts;
    }

    public function getAddPost($title, $author, $text)
    {
        $data_base = $this->dbConnect();
        $request = $data_base->prepare('INSERT INTO post(title, author, text, date_create, date_update) VALUES(?, ?, ?, NOW(), NOW())');
        $affected_lines = $request->execute(array($title, $author, $text));

        return $affected_lines;
    }

    public function getDeletePost($postId)
    {
        $data_base = $this->dbConnect();
        $post = $data_base->prepare('DELETE FROM post WHERE post_id = ?');
        $post->execute(array($postId));

        return $post;
    }

    public function getUpdatePost($postId, $title, $text)
    {
        $data_base = $this->dbConnect();
        $post = $data_base->prepare('UPDATE post SET title = :title, text = :text, date_update = NOW() WHERE post_id = :id');
        $post->execute(array(
            'title' => $title,
            'text' => $text,
            'id' => $postId,
        ));
        return $post;
    }

}