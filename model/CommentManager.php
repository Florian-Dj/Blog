<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM comment WHERE post_id = ? & status_comment = 0 ORDER BY date_create DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, username, text, status_comment, date_create) VALUES(?, ?, ?, 0, NOW())');
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
        $comment = $db->prepare('UPDATE comment SET status_comment = 1 WHERE comment_id = ?');
        $comment->execute(array($idComment));

        return $comment;
    }
}