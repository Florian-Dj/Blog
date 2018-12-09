<?php

namespace OpenClassRoom\Blog\Controller;
require (__DIR__ . '/../model/AdminManager.php');

class AdminController
{
    public function management()
    {
        $adminManager = new \OpenClassRoom\Blog\Model\AdminManager();
        $management_report = $adminManager->getManagementReport();

        require(__DIR__ . '/../view/back/viewManagement.php');
    }

    public function managementReport($status, $report_id, $comment_id){
        $adminManager = new \OpenClassRoom\Blog\Model\AdminManager();
        $management_report = $adminManager->updateManagementReport($status, $report_id);

        if ($status == 'valid'){
            $commentManager = new \OpenClassRoom\Blog\Model\CommentManager();
            $comment_report = $commentManager->updateManagementComment($comment_id);
        }

        header('Location: ?action=management');
    }

    //Connect Admin
    public function connect()
    {
        require(__DIR__ . '/../view/front/viewConnect.php');
    }

    public function formConnect()
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

    public function disconnect(){
        session_start();
        session_destroy();
        header('Location: ./index.php');
    }
}