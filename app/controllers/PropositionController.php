<?php

namespace app\controllers;

use app\models\ObjetModel;
use app\models\PropositionModel;
use Flight;

class PropositionController {
    
    public static function getUserStats($id_user) {
        $objetModel = new ObjetModel(Flight::db());
        $propositionModel = new PropositionModel(Flight::db());
        
        $objets_possedes = $objetModel->countUserObjects($id_user);
        $echanges_realises = $propositionModel->countEchangesRealises($id_user);
        $echanges_attente = $propositionModel->countEchangesEnAttente($id_user);
        $derniers_objets = $objetModel->getUserRecentObjects($id_user);
        
        return [
            'objets_possedes' => $objets_possedes,
            'echanges_realises' => $echanges_realises,
            'echanges_attente' => $echanges_attente,
            'derniers_objets' => $derniers_objets
        ];
    }

    public static function createProposition($idObject1, $idObject2) {
        $propositionModel = new PropositionModel(Flight::db());
        $stmt = Flight::db()->prepare("INSERT INTO Proposition (idObject1, idObject2, Status) VALUES (?, ?, 'en_attente')");
        return $stmt->execute([$idObject1, $idObject2]);
    }

    public static function updatePropositionStatus($id, $status) {
        $stmt = Flight::db()->prepare("UPDATE Proposition SET Status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    //maka proposition rehetra
    public static function getAllProposition() {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->findAllProposition();
    }

    public static function getPropositionById($id) {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->findPropositionById($id);
    }


    public static function getInfoProposition($id) {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->findInfoProposition($id);
    }

    public static function acceptProposition($id) {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->acceptProposition($id);
    }

    public static function declineProposition($id) {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->declineProposition($id);
    }

    public static function removeProposition($id) {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->removeProposition($id);
    }

    public static function updateProposition($id, $idObject1 = null, $idObject2 = null, $status = null) {
        $propositionModel = new PropositionModel(Flight::db());
        return $propositionModel->updateProposition($id, $idObject1, $idObject2, $status);
    }
}