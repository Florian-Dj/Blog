<?php

namespace OpenClassRoom\Blog\Controller;
require('./model/ReportManager.php');


class ReportController
{
    //Management Reports
    public function formReport($idComment)
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $reports = $reportManager->formReport($idComment);

        require('./view/front/viewReport.php');
    }

    public function addReport($idPost, $idComment, $author_report, $text_report)
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $reports = $reportManager->addReport($idPost, $idComment, $author_report, $text_report);

        $reportManager = new \OpenClassRoom\Blog\Model\CommentManager();
        $reports = $reportManager->updateComment($idComment);
    }
}