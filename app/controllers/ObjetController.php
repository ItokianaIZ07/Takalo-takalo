<?php

namespace app\controllers;

use app\models\ObjetModel;
use flight\Engine;
use Flight;

class ObjetController{
    public static function addnewObject($id_category, $name, $description, $prix_estimatif, $id_user){
        $ObjetModel = new ObjetModel(Flight::db());
        $ObjetModel->addnewObject($id_category, $name, $description, $prix_estimatif, $id_user);
    }

    public static function getById($name){
        $ObjetModel = new ObjetModel(Flight::db());
        return $ObjetModel->getById($name);
    }

    public static function getAllObject(){
        $ObjetModel = new ObjetModel(Flight::db());
        return $ObjetModel->getAllObject();
    }

    public static function getByCategory($id_category){
        $ObjetModel = new ObjetModel(Flight::db());
        return $ObjetModel->getByCategory($id_category);
    }
}