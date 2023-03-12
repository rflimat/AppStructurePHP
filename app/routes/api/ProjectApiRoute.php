<?php

use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;
use EasyProjects\SimpleRouter\Router;

require_once __DIR__ . "/../../controllers/ProjectController.php";

class ProjectApiRoute
{
    function __construct(Router $router)
    {
        $router->get("/api/projects", function(){
            if(verifySession()){
                $proyectos = new ProjectController();
                echo $proyectos->get();
            }
        });
    }
}