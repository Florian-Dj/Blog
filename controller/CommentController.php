<?php

namespace OpenClassRoom\Blog\Controller;
require(__DIR__ . '/../model/CommentManager.php');

class  CommentController
{
    //Management Comments
    public function addComment($postId, $author, $comment)
    {
        $comment_manager = new \OpenClassRoom\Blog\Model\CommentManager();
        $affected_lines = $comment_manager->addComment($postId, $author, $comment);

        if ($affected_lines === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: ?action=post&post=' . $postId);
        }
    }

    public function deleteComment($postID, $commentId)
    {
        $comment_manager = new \OpenClassRoom\Blog\Model\CommentManager();
        $comment = $comment_manager->delComment($commentId);

        if ($comment === false) {
            die('Impossible de supprimer le commentaire !');
        } else {
            header('Location: ?action=post&post=' . $_GET['post']);
        }
    }
}
