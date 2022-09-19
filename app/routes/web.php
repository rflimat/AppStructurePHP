<?php
    use EasyProjects\SimpleRouter\Request as Request;
    use EasyProjects\SimpleRouter\Response as Response;

    require_once __DIR__."/../controllers/UserController.php";
    require_once __DIR__."/../controllers/ProyectoController.php";

    //Web Controllers
    $router->get("/", function(){
        view('index.php');
    });

    $router->get("/error", function(){
        view('404.php');
    });

    $router->get("/login", function(){
        view('login.php');
    });

    $router->get("/signup", function(){
        view('signup.php');
    });

    $router->get("/forgotpassword", function(){
        view('forgotpassword.php');
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

    $router->get("/proyectos", function(){
        if(verifySession()){
            $proyectoController = new ProyectoController();
            $proyectoController->getProyectos();
        }
    });

    $router->get("/proyectos/search?{nombre}", function(){
        if(verifyToken($_REQUEST['token']) && verifySession()){
            $proyectoController = new ProyectoController();
            $proyectoController->getProyectoByNombre($_REQUEST['nombre']);
        }
        else {
            return;
        }
    });

    $router->get("/proyectos/edit?{id}", function(){
        $proyectoController = new ProyectoController();
        if(verifyToken($_REQUEST['token']) && verifySession()){
            $proyectoController->editProyecto($_REQUEST['id']);
        }
        else {
            return;
        }  
    });

    $router->post("/proyectos/insert", function(){
        if(verifyToken($_REQUEST['token']) && verifySession()){
            $proyectoController = new ProyectoController();
            $proyectoController->setProyecto($_REQUEST, $_FILES);
        }
        else {
            return;
        }
    });

    $router->put("/proyectos/update/{id}", function(){
        if(verifyToken($_REQUEST['token']) && verifySession()){
            $proyectoController = new ProyectoController();
            $proyectoController->updateProyecto($_REQUEST, $_FILES);
        }
        else {
            return;
        }
    });

    $router->delete("/proyectos/delete/{id}", function(){
        if(verifyToken($_REQUEST['token']) && verifySession()){
            $proyectoController = new ProyectoController();
            $proyectoController->deleteProyecto($_REQUEST['id']);
        }
    });
    
?>