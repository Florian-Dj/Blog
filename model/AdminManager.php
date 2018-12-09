<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class AdminManager extends Manager
{

    public function getConnect()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM admin');
        $admin = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $admin['password']);
        if ($admin['username'] != $_POST['username']) {
            header('Location: ?action=formConnect');
        } else {
            if (!$admin) {
                echo 'Mauvais  identifiant ou mot de passe';
            } else {
                if ($isPasswordCorrect) {
                    session_start();
                    $_SESSION['username'] = $admin['username'];
                    $_SESSION['password'] = $admin['password'];
                    header('Location: ./index.php');
                } else {
                    echo 'Mauvais  identifiant ou mot de passe';
                }
            }
        }
        return $admin;
    }

    public function getManagementReport()
    {
        $db = $this->dbConnect();
        $management_report = $db->query('SELECT * FROM report ORDER BY date_report');
        return $management_report;
    }
/*
    public function getManagementComment($id)
    {
        $db = $this->dbConnect();
        $management_comment = $db->prepare('SELECT * FROM comment WHERE comment_id = ?');
        $management_comment->execute(array($id));
        return $management_comment;
    }
*/

}