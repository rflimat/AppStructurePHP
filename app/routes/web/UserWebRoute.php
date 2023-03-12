<?php

use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;
use EasyProjects\SimpleRouter\Router;

require_once __DIR__ . "/../../controllers/UserController.php";

class UserWebRoute
{
    function __construct(Router $router)
    {
        $router->get("/login", function(){
            view('login');
        });
    
        $router->get("/signup", function(){
            view('signup');
        });
    
        $router->get("/forgotpassword", function(){
            view('forgotpassword');
        });
    
        $router->get("/logout", function(){
            deleteSession();
        });
    
        //Forma 1
        //$router->post("/autenticate", UserController::login(Request $req));
    
        //Forma 2
        $router->post("/autenticate", function(){
            if(verifyToken($_REQUEST['token'])){
                $userController = new UserController();
                $userController->login($_REQUEST);
            }
            else {
                return;
            }
        });
    
        $router->post("/register", function(){
            if(verifyToken($_REQUEST['token'])){
                $userController = new UserController();
                $userController->signUp($_REQUEST);
            }
            else {
                return;
            }
        });
    
        $router->post("/verifyemail", function(){
            if(verifyToken($_REQUEST['token'])){
                $userController = new UserController();
                $userController->validateEmail($_REQUEST);
            }
            else {
                return;
            }
        });
    
        $router->get("/resetpassword?{id}&{token}", function(){
            $userController = new UserController();
            $userController->validateToken($_REQUEST);
        });
    
        $router->post("/changepassword", function(){
            if(verifyToken($_REQUEST['token'])){
                $userController = new UserController();
                $userController->changePassword($_REQUEST);
            }
            else {
                return;
            }
        });
    }
}