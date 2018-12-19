<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class ReportManager extends Manager
{
    private $_report_id;
    private $_post_id;
    private $_comment_id;
    private $_authorReport;
    private $_textReport;
    private $_statusReport;

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

    public function getReportId()
    {
        return $this->_report_id;
    }

    public function setReportId($report_id)
    {
        $report_id = (int)$report_id;
        if ($report_id > 0) {
            $this->_report_id = $report_id;
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

    public function getAuthorReport()
    {
        return $this->_authorReport;
    }

    public function setAuthorReport($authorReport)
    {
        if (is_string($authorReport)) {
            $this->_authorReport = $authorReport;
        }
    }

    public function getTextReport()
    {
        return $this->_textReport;
    }

    public function setTextReport($textReport)
    {
        if (is_string($textReport)) {
            $this->_textReport = $textReport;
        }
    }

    public function getStatusReport()
    {
        return $this->_statusReport;
    }

    public function setStatusReport($statusReport)
    {
        if (is_string($statusReport)) {
            $this->_statusReport = $statusReport;
        }
    }


    public function formReport($idComment)
    {
        $data_base = $this->dbConnect();
        $comments = $data_base->prepare('SELECT * FROM P4_comment WHERE comment_id = ?');
        $comments->execute(array($idComment));

        return $comments;
    }

    public function addReport($idPost, $idComment, $author_report, $text_report)
    {
        $data_base = $this->dbConnect();
        $reports = $data_base->prepare('INSERT INTO P4_report(post_id, comment_id, author_report, text_report, date_report) VALUES(?, ?, ?, ?, NOW())');
        $reports->execute(array($idPost, $idComment, $author_report, $text_report));
        header('Location: ?action=post&post=' . $_GET['post']);

        return $reports;
    }
}