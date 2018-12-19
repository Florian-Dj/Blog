<?php

namespace OpenClassRoom\Blog\Model;
require_once('Manager.php');

class AdminManager extends Manager
{

    private $_id;
    private $_username;
    private $_password;

    //Hydrate
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //List getters
    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function getUsername()
    {
        return $this->_username;
    }

    //List setters

    public function setUsername($username)
    {
        if (is_string($username)) {
            $this->_username = $username;
        }
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword($password)
    {
        if (is_string($password)) {
            $this->_password = $password;
        }
    }

    public function getConnect()
    {
        $data_base = $this->dbConnect();
        $request = $data_base->query('SELECT * FROM P4_admin');
        $admin = $request->fetch();
        $password_correct = password_verify($_POST['password'], $admin['password']);
        if ($admin['username'] != $_POST['username']) {
            header('Location: ?action=formConnect');
        } else {
            if (!$admin) {
                echo 'Mauvais  identifiant ou mot de passe';
            } else {
                if ($password_correct) {
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
        $data_base = $this->dbConnect();
        $manag_report = $data_base->query('SELECT P4_report.*, P4_comment.username, P4_comment.text, P4_post.title FROM P4_report, P4_comment, P4_post WHERE P4_comment.comment_id = P4_report.comment_id AND P4_post.post_id = P4_report.post_id  ORDER BY date_report DESC');
        return $manag_report;
    }

    public function updateManagementReport($status, $report_id)
    {
        $data_base = $this->dbConnect();
        $manag_report = $data_base->prepare('UPDATE P4_report SET status_report = ? WHERE report_id = ?');
        $manag_report->execute(array($status, $report_id));

        return $manag_report;
    }
}