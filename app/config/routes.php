<?php

use app\controllers\UserController;
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
        $app->render('login', []);
    });

    $router->post('/register', function() use($app){
        $username = $_POST["username"];
        $server_response = UserController::addUser($username);
        echo $server_response;
    });
    


    $router->group('/api', function() use ($router) {

    });

})/*, [ SecurityHeadersMiddleware::class ])*/;