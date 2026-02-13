<?php

namespace app\models;

use PDO;

class PropositionModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //maka isan'ny echange efa vita
    public function countEchangesRealises($id_user) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM InfoProposition WHERE (idUser1 = ? OR idUser2 = ?) AND Status = 'termine'");
        $stmt->execute([$id_user, $id_user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }

    //maka isan'ny echange mbola en attente
    public function countEchangesEnAttente($id_user) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM InfoProposition WHERE (idUser1 = ? OR idUser2 = ?) AND Status = 'en_attente'");
        $stmt->execute([$id_user, $id_user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }


    public function getPropositionsByUser($id_user) {
        $stmt = $this->db->prepare("SELECT * FROM InfoProposition WHERE idUser1 = ? OR idUser2 = ? ORDER BY id DESC");
        $stmt->execute([$id_user, $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}