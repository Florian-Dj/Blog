<?php

namespace OpenClassRoom\Blog\Controller;
use OpenClassRoom\Blog\Model\CommentManager;
use OpenClassRoom\Blog\Model\ReportManager;

require(__DIR__ . '/../model/ReportManager.php');


class ReportController
{
    //Management Reports
    public function formReport($idComment)
    {
        $reportManager = new ReportManager();
        $comments = $reportManager->formReport($idComment);

        require(__DIR__ . '/../view/front/viewReport.php');
    }

    public function addReport($idPost, $idComment, $author_report, $text_report)
    {
        $report_manager = new ReportManager();
        $report_manager->addReport($idPost, $idComment, $author_report, $text_report);

        $report_manager = new CommentManager();
        $report_manager->updateComment($idComment);
    }
}