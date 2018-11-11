<?php
    require('./model/model.php');
    require('./model/PostManager.php');
    require('./model/CommentManager.php');

    function index()
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $req = $postManager->getPostsIndex();

        require('./view/front/viewIndex.php');
    }

    function posts()
    {
        $postsManager = new \OpenClassRoom\Blog\Model\PostManager();
        $posts = $postsManager->getPosts();

        require('./view/front/viewPosts.php');
    }

    function post()
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $commentManager = new \OpenClassRoom\Blog\Model\CommentManager();

        $posts = $postManager->getPost(htmlspecialchars($_GET['post']));
        $comments = $commentManager->getComments(htmlspecialchars($_GET['post']));

        require('./view/front/viewPost.php');
    }

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





    function addPost()
    {
        require('./view/back/viewAddPost.php');
    }

    function formAddPost($title, $author, $text)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();

        $affectedLines = $postManager->getAddPost($title, $author, $text);

        if($affectedLines === false){
            throw new Exception('Impossible d\'ajouter le post !');
        }
        else{
            header('Location index.php?action=posts');
        }
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
