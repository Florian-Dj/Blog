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