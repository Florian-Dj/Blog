<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class ReportManager extends Manager
{
    private $_reportId;
    private $_postId;
    private $_commentId;
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

    //List getters
    public function getReportId()
    {
        return $this->_reportId;
    }

    public function getPostId()
    {
        return $this->_postId;
    }

    public function getCommentId()
    {
        return $this->_commentId;
    }

    public function getAuthorReport()
    {
        return $this->_authorReport;
    }

    public function getTextReport()
    {
        return $this->_textReport;
    }

    public function getStatusReport()
    {
        return $this->_statusReport;
    }

    //List setters
    public function setReportId($reportId)
    {
        $reportId = (int)$reportId;
        if ($reportId > 0) {
            $this->_reportId = $reportId;
        }
    }

    public function setPostId($postId)
    {
        $postId = (int)$postId;
        if ($postId > 0) {
            $this->_postId = $postId;
        }
    }

    public function setCommentId($commentId)
    {
        $commentId = (int)$commentId;
        if ($commentId > 0) {
            $this->_commentId = $commentId;
        }
    }

    public function setAuthorReport($authorReport)
    {
        if (is_string($authorReport)) {
            $this->_authorReport = $authorReport;
        }
    }

    public function setTextReport($textReport)
    {
        if (is_string($textReport)) {
            $this->_textReport = $textReport;
        }
    }

    public function setStatusReport($statusReport)
    {
        if (is_string($statusReport)) {
            $this->_statusReport = $statusReport;
        }
    }


    public function formReport($idComment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM comment WHERE comment_id = ?');
        $comments->execute(array($idComment));

        return $comments;
    }

    public function addReport($idPost, $idComment, $author_report, $text_report)
    {
        $db = $this->dbConnect();
        $reports = $db->prepare('INSERT INTO report(post_id, comment_id, author_report, text_report, date_report) VALUES(?, ?, ?, ?, NOW())');
        $reports->execute(array($idPost, $idComment, $author_report, $text_report));
        header('Location: ?action=post&post=' . $_GET['post']);

        return $reports;
    }
}