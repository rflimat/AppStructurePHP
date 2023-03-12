<?php

use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;
use EasyProjects\SimpleRouter\Router;

require_once __DIR__ . "/../../controllers/ProjectController.php";

class ProjectWebRoute
{
    function __construct(Router $router)
    {
        $router->get("/projects", function () {
            if (verifySession()) {
                $projectController = new ProjectController();
                $projectController->list();
            }
        });

        $router->get("/projects/search?{nombre}", function () {
            if (verifyToken($_REQUEST['token']) && verifySession()) {
                $projectController = new ProjectController();
                $projectController->getByName($_REQUEST['nombre']);
            } else {
                return;
            }
        });

        $router->get("/projects/edit?{id}", function () {
            $projectController = new ProjectController();
            if (verifyToken($_REQUEST['token']) && verifySession()) {
                $projectController->edit($_REQUEST['id']);
            } else {
                return;
            }
        });

        $router->post("/projects/insert", function () {
            if (verifyToken($_REQUEST['token']) && verifySession()) {
                $projectController = new ProjectController();
                $projectController->store($_REQUEST, $_FILES);
            } else {
                return;
            }
        });

        $router->put("/projects/update/{id}", function () {
            if (verifyToken($_REQUEST['token']) && verifySession()) {
                $projectController = new ProjectController();
                $projectController->update($_REQUEST, $_FILES);
            } else {
                return;
            }
        });

        $router->delete("/projects/delete/{id}", function () {
            if (verifyToken($_REQUEST['token']) && verifySession()) {
                $projectController = new ProjectController();
                $projectController->delete($_REQUEST['id']);
            }
        });
    }
}
