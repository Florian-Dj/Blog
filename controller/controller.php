<?php
    require('./model/model.php');
    require('./model/PostManager.php');
    require('./model/CommentManager.php');
    require ('./model/AdminManager.php');

    function index()
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $req = $postManager->getPostsIndex();
        require('./view/front/viewIndex.php');
    }

    //Management all Posts
    function posts()
    {
        $postsManager = new \OpenClassRoom\Blog\Model\PostManager();
        $posts = $postsManager->getPosts();

        require('./view/front/viewPosts.php');
    }

    //Management post
    function post($postId)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $commentManager = new \OpenClassRoom\Blog\Model\CommentManager();

        $posts = $postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        require('./view/front/viewPost.php');
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
            die('Impossible d\'ajouter le post !');
        }
        else{
            header('Location: ?action=posts');
        }
    }

    function deletePost($postId)
    {
        $postManager =  new \OpenClassRoom\Blog\Model\PostManager();
        $post = $postManager->getDeletePost($postId);

        if($post === false){
            die('Impossible d\'ajouter le post !');
        }
        else{
            header('Location: ?action=posts');
        }
    }

    function updatePost($postId)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();

        $posts = $postManager->getPost($postId);

        require('./view/back/viewEditPost.php');
    }

    function formUpdatePost($postId, $postTitle, $postText)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();

        $post = $postManager->getUpdatePost($postId, $postTitle, $postText);

        header('Location: ?action=post&post=' . $_GET['post']);
    }

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
