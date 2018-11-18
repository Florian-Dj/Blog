<?php
    require ('./model/AdminManager.php');
    require ('./model/ReportManager.php');


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
