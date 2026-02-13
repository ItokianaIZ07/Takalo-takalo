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

    //maka proposition rehetra
    public function findAllProposition() {
        $stmt = $this->db->prepare("SELECT * FROM Proposition ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //maka proposition 1 @ id any
    public function findPropositionById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Proposition WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //maka info detail proposition @ ilay view izay avy namboarina
    public function findInfoProposition($id) {
        $stmt = $this->db->prepare("SELECT * FROM InfoProposition WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //mi accepter proposition
    public function acceptProposition($id) {
        $stmt = $this->db->prepare("UPDATE Proposition SET Status = 'accepte' WHERE id = ?");
        return $stmt->execute([$id]);
    }

    //mi refuser proposition
    public function declineProposition($id) {
        $stmt = $this->db->prepare("UPDATE Proposition SET Status = 'refuse' WHERE id = ?");
        return $stmt->execute([$id]);
    }

    //mamafa proposition
    public function removeProposition($id) {
        $stmt = $this->db->prepare("DELETE FROM Proposition WHERE id = ?");
        return $stmt->execute([$id]);
    }

    //manao maj proposition
    public function updateProposition($id, $idObject1 = null, $idObject2 = null, $status = null) {
        $sql = "UPDATE Proposition SET ";
        $params = [];
        $updates = [];
        
        if ($idObject1 !== null) {
            $updates[] = "idObject1 = ?";
            $params[] = $idObject1;
        }
        if ($idObject2 !== null) {
            $updates[] = "idObject2 = ?";
            $params[] = $idObject2;
        }
        if ($status !== null) {
            $updates[] = "Status = ?";
            $params[] = $status;
        }
        
        if (empty($updates)) {
            return false;
        }
        
        $sql .= implode(", ", $updates);
        $sql .= " WHERE id = ?";
        $params[] = $id;
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

}