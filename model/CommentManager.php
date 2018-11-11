<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM comment WHERE post_id = ? ORDER BY date_create DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, username, text, date_create) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    private function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'clavier');
            return $db;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}