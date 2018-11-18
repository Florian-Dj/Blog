<?php

namespace OpenClassRoom\Blog\Controller;
require('./model/CommentManager.php');

class  CommentController
{
    //Management Comments
    public function addComment($postId, $author, $comment)
    {
        $commentManager = new \OpenClassRoom\Blog\Model\CommentManager();

        $affectedLines = $commentManager->addComment($postId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else{
            header('Location: ?action=post&post=' . $postId);
        }
    }

    public function deleteComment($postID, $commentId)
    {
        $commentManger = new \OpenClassRoom\Blog\Model\CommentManager();

        $comment = $commentManger->delComment($commentId);

        if ($comment === false) {
            die('Impossible de supprimer le commentaire !');
        }
        else{
            header('Location: ?action=post&post=' . $_GET['post']);
        }
    }
}
