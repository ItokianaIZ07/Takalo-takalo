<?php

namespace app\models;

use Flight;
use PDO;

class AdminModel{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function isAdmin($username, $email, $password){
        $stmt = $this->db->prepare("SELECT COUNT(username) FROM Admin WHERE username=:username AND email=:email");
        $stmt->execute([
            ":username"=>$username,
            ":email"=>$email
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM Admin WHERE email=:email");
        $stmt->execute([
            ":email"=>$email
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

