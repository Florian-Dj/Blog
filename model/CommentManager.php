<?php

namespace OpenClassRoom\Blog\Model;

require_once('./model/Manager.php');

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM comment WHERE post_id = ? ORDER BY date_create DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, username, text, date_create) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function getDelComment($postId, $commentId)
    {
        $db = $this->dbConnect($commentId);
        $comment = $db->prepare('DELETE FROM comment WHERE comment_id = ?');
        $comment->execute(array($commentId));
        $report = $db->prepare('DELETE FROM report WHERE post_id = ?');
        $report->execute(array($postId));
        return $comment;
    }
}