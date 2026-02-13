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
}