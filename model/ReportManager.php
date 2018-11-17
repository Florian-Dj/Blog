<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class ReportManager
{
    public function getFormReportComment($commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT * FROM comment WHERE comment_id = ?');
        $comment->execute(array($commentId));
        return $comment->fetch();
    }

    public function getReportComment()
    {
        $db = dbConnect();
        $comment = $this->$db->prepare('INSERT INTO report(post_id, comment_id, author_report, text_report, date_report, status) VALUES(:id_post, :id_comment, :author_report, :text_report, NOW(), :status)');
        $comment->execute(array(
            'id_post' => $_GET['post'],
            'id_comment' => $_GET['comment'],
            'author_report' => $_POST['username_report'],
            'text_report' => $_POST['text_report'],
            'status' => 'En étude',
        ));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $comment;
    }
}