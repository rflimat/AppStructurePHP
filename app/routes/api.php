<?php
    require_once __DIR__."/../controllers/ProyectoController.php";

    //API Rest    
    $router->get("/api/proyectos", function(){
        if(verifySession()){
            $proyectos = new ProyectoController();
            echo $proyectos->getApiProyectos();
        }
    });
?>