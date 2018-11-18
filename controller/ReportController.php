<?php

namespace OpenClassRoom\Blog\Controller;
require('./model/ReportManager.php');


class ReportController
{
//Management Reports
    public function getReport($idComment)
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $report = $reportManager->getReport();
        require('./view/front/viewReport.php');
    }

    public function addReport($idPost, $idComment, $author_report, $text_report)
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $report = $reportManager->addReport($idPost, $idComment, $author_report, $text_report);

        $reportManager = new \OpenClassRoom\Blog\Model\CommentManager();
        $report = $reportManager->updateComment($idComment);
    }
}
