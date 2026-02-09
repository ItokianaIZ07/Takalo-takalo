<?php

namespace app\controllers;

use app\models\AdminModel;
use flight\Engine;
use Flight;

class AdminController{
    public static function verificationAdmin(String $username, String $email, $password){
        $AdminModel = new AdminModel(Flight::db());
        $admin = $AdminModel->isAdmin($username, $email);
        if($admin != null && $admin["password"] != null){
            return password_verify($password, $admin["password"]);
        }
        return false;
    }

    public static function getByEmail($username){
        $AdminModel = new AdminModel(Flight::db());
        $admin = $AdminModel->getByEmail($username);
        return $admin;
    }
}