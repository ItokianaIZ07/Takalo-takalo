<?php

namespace app\models;

use Flight;
use PDO;

class ObjetModel{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function addnewObject($id_category, $name, $description, $prix_estimatif, $id_user){
        $stmt = $this->db->prepare("INSERT INTO Objet(id_category, name, description, prix_estimatif, id_user) VALUES(?, ?, ?, ?, ?)");
        $stmt->execute([$id_category, $name, $description, $prix_estimatif, $id_user]);
    }

    public function getById($name){
        $stmt = $this->db->prepare("SELECT id_category, name, description, prix_estimatif FROM Objet WHERE name=:name");
        $stmt->execute([
            ":name"=>$name
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllObject(){
        $stmt = $this->db->prepare("SELECT id_category, name, description, prix_estimatif FROM Objet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCategory($id_category){
        $stmt = $this->db->prepare("SELECT id_category, name, description, prix_estimatif FROM Objet WHERE id_category=:id_category");
        $stmt->execute([
            ":id_category"=>$id_category
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}