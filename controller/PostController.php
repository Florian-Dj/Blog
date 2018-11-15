<?php

namespace OpenClassRoom\Blog\Controller;
require('./model/PostManager.php');

class PostController
{

    function index()
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $req = $postManager->getPostsIndex();
        require('./view/front/viewIndex.php');
    }


    //Management all Posts
    public function posts()
    {
        $postsManager = new \OpenClassRoom\Blog\Model\PostManager();
        $posts = $postsManager->getPosts();

        require('./view/front/viewPosts.php');
    }

    //Management post
    public function post($postId)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $commentManager = new \OpenClassRoom\Blog\Model\CommentManager();

        $posts = $postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        require('./view/front/viewPost.php');
    }

    public function addPost()
    {
        require('./view/back/viewAddPost.php');
    }

    public function formAddPost($title, $author, $text)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();

        $affectedLines = $postManager->getAddPost($title, $author, $text);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le post !');
        } else {
            header('Location: ?action=posts');
        }
    }

    public function deletePost($postId)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();
        $post = $postManager->getDeletePost($postId);

        if ($post === false) {
            die('Impossible d\'ajouter le post !');
        } else {
            header('Location: ?action=posts');
        }
    }

    public function updatePost($postId)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();

        $posts = $postManager->getPost($postId);

        require('./view/back/viewEditPost.php');
    }

    public function formUpdatePost($postId, $postTitle, $postText)
    {
        $postManager = new \OpenClassRoom\Blog\Model\PostManager();

        $post = $postManager->getUpdatePost($postId, $postTitle, $postText);

        header('Location: ?action=post&post=' . $_GET['post']);
    }
}