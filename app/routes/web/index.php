<?php

use EasyProjects\SimpleRouter\Request as Request;
use EasyProjects\SimpleRouter\Response as Response;

require_once "ProjectWebRoute.php";
require_once "UserWebRoute.php";

//Web Controllers
$router->get("/", function () {
    view('index');
});

$router->get("/error", function () {
    view('404');
});

new ProjectWebRoute($router);
new UserWebRoute($router);

//view("404");