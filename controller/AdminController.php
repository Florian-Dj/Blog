<?php

namespace OpenClassRoom\Blog\Controller;
require (__DIR__ . '/../model/AdminManager.php');

class AdminController
{
    public function management()
    {
        $adminManager = new \OpenClassRoom\Blog\Model\AdminManager();
        $management_report = $adminManager->getManagementReport();
        //$management_comment = $adminManager->getManagementComment(intval(15);

        require(__DIR__ . '/../view/back/viewManagement.php');
    }

    //Management Admin
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