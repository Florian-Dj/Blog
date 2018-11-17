<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class ReportManager extends Manager
{
    public function getReportComment($commentId)
    {
        $db = $this->dbConnect();
        $report = $db->prepare('SELECT * FROM comment WHERE comment_id = ?');
        $report->execute(array($commentId));
        return $report->fetch();
    }

    public function addReportComment($idPost, $idComment, $author_report, $text_report)
    {
        $db = $this->dbConnect();
        $report = $db->prepare('INSERT INTO report(post_id, comment_id, author_report, text_report, date_report, status) VALUES(?, ?, ?, ?, NOW(), 1)');
        $report->execute(array($idPost, $idComment, $author_report, $text_report));
        header('Location: ?action=post&post=' . $_GET['post']);
        return $report;
    }
}