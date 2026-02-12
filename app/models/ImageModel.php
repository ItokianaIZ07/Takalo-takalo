<?php

namespace app\models;

use Flight;
use PDO;

class ImageModel{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function addnewImage($id_objet, $url){
        $stmt = $this->db->prepare("INSERT INTO Image(id_objet, url) VALUES(?, ?)");
        $stmt->execute([$id_objet, $url]);
    }

    public function getById($id_objet){
        $stmt = $this->db->prepare("SELECT id_objet, url FROM Image WHERE id_objet=:id_objet");
        $stmt->execute([
            ":id_objet"=>$id_objet
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}