<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class CommentManager extends Manager
{
    private $_commentId;
    private $_post_Id;
    private $_username;
    private $_text;
    private $_reportComment;

    //Constructor
    /*
    public function __construct($_commentId, $_post_Id, $_username, $_text, $_reportComment)
    {
        $this->_commentId = $_commentId;
        $this->_post_Id = $_post_Id;
        $this->_username = $_username;
        $this->_text = $_text;
        $this->_reportComment = $_reportComment;
    }
    */

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
    public function getCommentId()
    {
        return $this->_commentId;
    }
    public function getPostId()
    {
        return $this->_post_Id;
    }
    public function getUsername()
    {
        return $this->_username;
    }
    public function getText()
    {
        return $this->_text;
    }
    public function getReportComment()
    {
        return $this->_reportComment;
    }

    //List setters
    public function setCommentId($commentId)
    {
        $commentId = (int)$commentId;
        if ($commentId > 0) {
            $this->_commentId = $commentId;
        }
    }
    public function setPostId($post_Id)
    {
        $post_Id = (int)$post_Id;
        if ($post_Id > 0) {
            $this->_post_Id = $post_Id;
        }
    }
    public function setUsername($username)
    {
        if (is_string($username)) {
            $this->_username = $username;
        }
    }
    public function setText($text)
    {
        if (is_string($text)) {
            $this->_text = $text;
        }
    }
    public function setReportComment($reportComment)
    {
        if (is_string($reportComment)) {
            $this->_reportComment = $reportComment;
        }
    }


    //Call SQL
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM comment WHERE post_id = ? AND report_comment = false ORDER BY date_create DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, username, text, date_create) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function delComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comment WHERE comment_id = ?');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function updateComment($idComment)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment SET report_comment = true WHERE comment_id = ?');
        $comment->execute(array($idComment));

        return $comment;
    }

    public function updateManagementComment($comment_id)
    {
        $db =$this->dbConnect();
        $comment = $db->prepare('UPDATE comment SET report_comment = false WHERE comment_id = ?');
        $comment->execute(array($comment_id));
    }
}