<?php

namespace OpenClassRoom\Blog\Controller;
require ('./model/AdminManager.php');

class AdminController
{
    public function management()
    {
        $adminManager = new \OpenClassRoom\Blog\Model\AdminManager();
        $management = $adminManager->getManagement();

        require('./view/back/viewManagement.php');
    }
    //Management Admin
    public function connect()
    {
        require('./view/front/viewConnect.php');
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