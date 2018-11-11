<?php
    require('./model/model.php');
    require('./model/PostManager.php');

    function index()
    {
        $req = getPostsIndex();
        require('./view/front/viewIndex.php');
    }

    function posts()
    {
        $postsManager = new PostManager();
        $posts = $postsManager->getPosts();
        require('./view/front/viewPosts.php');
    }

    function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();


        $posts = $postManager->getPost(htmlspecialchars($_GET['post']));
        $comments = $commentManager->getComment(htmlspecialchars($_GET['post']));
        require('./view/front/viewPost.php');
    }





    function add_post()
    {
        require('./view/back/viewAddPost.php');
    }

    function form_add_post()
    {
        $admin = getAddPost();
    }

    function delete_post()
    {
        $post = getDelPost();
    }

    function edit_post()
    {
        $posts = getPost($_GET['post']);
        require('./view/back/viewEditPost.php');
    }

    function form_edit_post()
    {
        $post = getEditPost();
    }

    function form_comment()
    {
        $comment = getAddComment();
    }

    function delete_comment()
    {
        $comment = getDelComment();
    }

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


    function connect()
    {
        require('./view/front/viewConnect.php');
    }

    function form_connect()
    {
        $admin = getConnect();
    }

    function disconnect(){
        session_start();
        session_destroy();
        header('Location: ./index.php');
    }
