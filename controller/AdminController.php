<?php

namespace OpenClassRoom\Blog\Controller;
require(__DIR__ . '/../model/AdminManager.php');

class AdminController
{
    public function management()
    {
        $admin_manager = new \OpenClassRoom\Blog\Model\AdminManager();
        $manag_report = $admin_manager->getManagementReport();

        require(__DIR__ . '/../view/back/viewManagement.php');
    }

    public function managementReport($status, $report_id, $comment_id)
    {
        $admin_manager = new \OpenClassRoom\Blog\Model\AdminManager();
        $manag_report = $admin_manager->updateManagementReport($status, $report_id);

        if ($status == 'valid') {
            $comment_manager = new \OpenClassRoom\Blog\Model\CommentManager();
            $comment_report = $comment_manager->updateManagementComment($comment_id);
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
        $admin_manager = new \OpenClassRoom\Blog\Model\AdminManager();
        $admin = $admin_manager->getConnect();

        if ($admin === false) {
            die('Impossible de se connect');
        } else {
            header('Location: ?action=index');
        }
    }

    public function disconnect()
    {
        session_start();
        session_destroy();
        header('Location: ./index.php');
    }
}