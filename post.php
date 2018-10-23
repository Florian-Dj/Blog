<?php
    require('model.php');

    if (isset($_GET['post']) && $_GET['post'] > 0)
    {
        $posts = getPost($_GET['post']);
        $comments = getComment($_GET['post']);
        require('viewPost.php');
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    }

