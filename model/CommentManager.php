<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class CommentManager extends Manager
{
    private $_comment_id;
    private $_post_id;
    private $_username;
    private $_text;
    private $_reportComment;

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

    public function getCommentId()
    {
        return $this->_comment_id;
    }

    public function setCommentId($comment_id)
    {
        $comment_id = (int)$comment_id;
        if ($comment_id > 0) {
            $this->_comment_id = $comment_id;
        }
    }

    public function getPostId()
    {
        return $this->_post_id;
    }

    public function setPostId($post_id)
    {
        $post_id = (int)$post_id;
        if ($post_id > 0) {
            $this->_post_id = $post_id;
        }
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function setUsername($username)
    {
        if (is_string($username)) {
            $this->_username = $username;
        }
    }

    public function getText()
    {
        return $this->_text;
    }

    public function setText($text)
    {
        if (is_string($text)) {
            $this->_text = $text;
        }
    }

    public function getReportComment()
    {
        return $this->_reportComment;
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
        $data_base = $this->dbConnect();
        $comments = $data_base->prepare('SELECT * FROM comment WHERE post_id = ? AND report_comment = false ORDER BY date_create DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function addComment($postId, $author, $comment)
    {
        $data_base = $this->dbConnect();
        $comments = $data_base->prepare('INSERT INTO comment(post_id, username, text, date_create) VALUES(?, ?, ?, NOW())');
        $affected_lines = $comments->execute(array($postId, $author, $comment));

        return $affected_lines;
    }

    public function delComment($commentId)
    {
        $data_base = $this->dbConnect();
        $comment = $data_base->prepare('DELETE FROM comment WHERE comment_id = ?');
        $comment->execute(array($commentId));

        return $comment;
    }

    public function updateComment($idComment)
    {
        $data_base = $this->dbConnect();
        $comment = $data_base->prepare('UPDATE comment SET report_comment = true WHERE comment_id = ?');
        $comment->execute(array($idComment));

        return $comment;
    }

    public function updateManagementComment($comment_id)
    {
        $data_base = $this->dbConnect();
        $comment = $data_base->prepare('UPDATE comment SET report_comment = false WHERE comment_id = ?');
        $comment->execute(array($comment_id));
    }
}