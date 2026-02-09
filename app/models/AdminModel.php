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
        $stmt = $this->db->prepare("SELECT COUNT(username) FROM Admin WHERE username=:username AND email=:email AND password=:password");
        $stmt->execute([
            ":username"=>$username,
            ":email"=>$email,
            ":password"=>$password
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result > 0 ? true: false;
    }

}

