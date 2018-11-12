<?php

namespace OpenClassRoom\Blog\Model;

class Manager
{

    protected function dbConnect()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'clavier');
            return $db;
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}