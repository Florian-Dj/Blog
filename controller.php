<?php
    require('model.php');

    function index()
    {
        $req = getPostsIndex();
        require('viewIndex.php');
    }

    function post()
    {
        $posts = getPost($_GET['post']);
        $comments = getComment($_GET['post']);
        require('viewPost.php');
    }