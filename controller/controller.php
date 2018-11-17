<?php
    require ('./model/AdminManager.php');
    require ('./model/ReportManager.php');


    //Management Reports
    function report_comment()
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $comment = $reportManager->getFormReportComment($_GET['comment']);
        require('./view/back/viewReport.php');
    }

    function form_report()
    {
        $reportManager = new \OpenClassRoom\Blog\Model\ReportManager();
        $report = $reportManager->getReportComment();
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
