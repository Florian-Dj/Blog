<?php

namespace OpenClassRoom\Blog\Controller;

use OpenClassRoom\Blog\Model\CommentManager;
use OpenClassRoom\Blog\Model\PostManager;

require(__DIR__ . '/../model/PostManager.php');

class PostController
{

    public function index()
    {
        $postManager = new PostManager();
        $request = $postManager->getPostsIndex();
        require(__DIR__ . '/../view/front/viewIndex.php');
    }


    //Management all Posts
    public function posts()
    {
        $posts_manager = new PostManager();
        $posts = $posts_manager->getPosts();

        require(__DIR__ . '/../view/front/viewPosts.php');
    }

    //Management post
    public function post($postId)
    {
        $post_manager = new PostManager();
        $comment_manager = new CommentManager();

        $posts = $post_manager->getPost($postId);
        $comments = $comment_manager->getComments($postId);

        require(__DIR__ . '/../view/front/viewPost.php');
    }

    public function addPost()
    {
        require(__DIR__ . '/../view/back/viewAddPost.php');
    }

    public function formAddPost($title, $author, $text)
    {
        $post_manager = new PostManager();

        $affected_lines = $post_manager->getAddPost($title, $author, $text);

        if ($affected_lines === false) {
            die('Impossible d\'ajouter le post !');
        } else {
            header('Location: ?action=posts');
        }
    }

    public function deletePost($postId)
    {
        $post_manager = new PostManager();
        $post = $post_manager->getDeletePost($postId);

        if ($post === false) {
            die('Impossible d\'ajouter le post !');
        } else {
            header('Location: ?action=posts');
        }
    }

    public function updatePost($postId)
    {
        $post_manager = new PostManager();

        $posts = $post_manager->getPost($postId);

        require(__DIR__ . '/../view/back/viewEditPost.php');
    }

    public function formUpdatePost($postId, $postTitle, $postText)
    {
        $post_manager = new PostManager();

        $post_manager->getUpdatePost($postId, $postTitle, $postText);

        header('Location: ?action=post&post=' . $_GET['post']);
    }
}