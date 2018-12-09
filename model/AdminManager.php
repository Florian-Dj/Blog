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
        $management_report = $db->query('SELECT report.*, comment.username, comment.text, post.title FROM report, comment, post WHERE comment.comment_id = report.comment_id AND post.post_id = report.post_id  ORDER BY date_report DESC');
        return $management_report;
    }

    public function updateManagementReport($status, $report_id)
    {
        $db = $this->dbConnect();
        $management_report = $db->prepare('UPDATE report SET status_report = ? WHERE report_id = ?');
        $management_report->execute(array($status, $report_id));

        return $management_report;
    }
}