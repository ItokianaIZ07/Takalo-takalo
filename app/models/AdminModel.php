<?php

namespace app\models;

use Flight;
use PDO;

class AdminModel{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function isAdmin($email){
        $stmt = $this->db->prepare("SELECT * FROM Admin WHERE email=:email");
        $stmt->execute([
            ":email"=>$email
        ]);
        $result = ($stmt->fetchAll(PDO::FETCH_ASSOC))[0];
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

