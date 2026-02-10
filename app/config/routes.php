<?php

use app\controllers\AdminController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

    // $router->get('/', [ UserController::class, 'getTrajets' ]);
    $router->get('/', function() use($app){
        $app->render('admin', []);
    });

    $router->post('/admin-verification', function() use($app){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $server_response = AdminController::verificationAdmin($email, $password);
        if($server_response){
            session_start();
            $_SESSION["admin"] = AdminController::getId($email)[0];
            echo json_encode([
                "success"=>true,
                "error"=>false
            ]);
        }else{
            echo json_encode([
                "success"=>false,
                "error"=>true
            ]);
        }
    });

    $router->get('/admin-home', function() use($app){
        $app->render('admin-model', [
            "contentPage"=>"admin-dashboard",
            "titlePage"=>"Home"
        ]);
    });
    $router->get('/admin-objects', function() use($app){
        $app->render('admin-model', [
            "contentPage"=>"admin-objects",
            "titlePage"=>"Object"
        ]);
    });
    $router->get('/admin-categories', function() use($app){
        $app->render('admin-model', [
            "contentPage"=>"admin-categories",
            "titlePage"=>"Category"
        ]);
    });
    $router->get('/logout', function() use($app){
        session_start();
        session_destroy();
        $app->redirect('/');
    });
    $router->get('/*', function() use($app){
        $app->render('404', []);
    });

    // $router->post('/register', function() use($app){
    //     $username = $_POST["username"];
    //     $server_response = UserController::addUser($username);
    //     echo $server_response;
    // });
    


    $router->group('/api', function() use ($router) {

    });

})/*, [ SecurityHeadersMiddleware::class ])*/;