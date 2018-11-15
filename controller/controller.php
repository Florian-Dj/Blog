<?php
    require('./model/model.php');
    require('./model/CommentManager.php');
    require ('./model/AdminManager.php');

    //Management Comments
    function addComment($postId, $author, $comment)
    {
        $commentManager = new \OpenClassRoom\Blog\Model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else{
            header('Location: ?action=post&post=' . $postId);
        }
    }

    function deleteComment($postID, $commentId)
    {
        $commentManger = new \OpenClassRoom\Blog\Model\CommentManager();

        $comment = $commentManger->getDelComment($postID, $commentId);

        if ($comment === false) {
            die('Impossible de supprimer le commentaire !');
        }
        else{
            header('Location: ?action=post&post=' . $_GET['post']);
        }
    }

    //Management Reports
    function report_comment()
    {
        $comment = getFormReportComment($_GET['comment']);
        require('./view/back/viewReport.php');
    }

    function form_report()
    {
        $report = getReportComment();
    }

    function management()
    {
        $management = getManagement();
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
