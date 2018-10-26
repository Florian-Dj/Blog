<?php
    require('./model/model.php');

    function index()
    {
        $req = getPostsIndex();
        require('./view/viewIndex.php');
    }

    function post()
    {
        $posts = getPost($_GET['post']);
        $comments = getComment($_GET['post']);
        require('./view/viewPost.php');
    }

    function posts()
    {
        $req = getPosts();
        require('./view/viewPosts.php');
    }

    function add_post()
    {
        require('./view/viewAddPost.php');
    }

    function form_add_post()
    {
        $admin = getAddPost();
    }

    function connect()
    {
        require('./view/viewConnect.php');
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
