<?php
    require ('./model/AdminManager.php');
    require ('./model/ReportManager.php');


    //Management Reports
    function getReport()
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $report = $reportManager->getReportComment($_GET['comment']);
        require('./view/front/viewReport.php');
    }

    function addReport($idPost, $idComment, $author_report, $text_report)
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $report = $reportManager->addReportComment($idPost, $idComment, $author_report, $text_report);
    }

    function management()
    {
        $adminManager = new \OpenClassRoom\Blog\Model\AdminManager();
        $management = $adminManager->getManagement();
        require('./view/back/viewManagement.php');
    }

    //Management Admin
    function connect()
    {
        require('./view/front/viewConnect.php');
    }

    function formConnect()
    {
        $adminManager = new \OpenClassRoom\Blog\Model\AdminManager();
        $admin = $adminManager->getConnect();

        if($admin === false){
            die('Impossible de se connect');
        }
        else{
            header('Location: ?action=index');
        }
    }

    function disconnect(){
        session_start();
        session_destroy();
        header('Location: ./index.php');
    }
