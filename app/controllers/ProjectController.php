<?php
require_once __DIR__ . "/../models/Project.php";

class ProjectController
{
    public function get()
    {
        $project = new Project();
        return json_encode($project->get());
    }

    public function list()
    {
        $projects = Project::get();
        view("projects", ['projects' => $projects]);
    }

    public function store($req, $files)
    {
        $objproject = new Project();
        $objproject->nombre = $req['nombre']; 
        $objproject->descripcion = $req['descripcion'];

        $fecha = new DateTime();
        $imagen = $fecha->getTimestamp() . "_" . $files['imagen']['name'];
        $imagen_temp = $files['imagen']['tmp_name'];
        move_uploaded_file($imagen_temp, __DIR__ . "/../storage/projects/" . $imagen);

        $objproject->imagen = $imagen;

        $objproject->save();
        redirect("/projects");
    }

    public function getById($id)
    {
        return Project::getById($id);
    }

    public function getByName($nombre)
    {
        $projects = Project::getByName($nombre);
        view("projects", ['projects' => $projects]);
    }

    public function edit($id) {
        $project = Project::getById($id);
        view("update", ['project' => $project[0]]);
    }

    public function update($req, $files)
    {
        $project = new Project();
        $project->nombre = $req['nombre'];
        $project->imagen = $req['imagen'];
        $project->descripcion = $req['descripcion'];

        if ($files['newimagen']['name'] != "") {
            unlink(__DIR__ . "/../storage/projects/" . $req['imagen']);
            $fecha = new DateTime();
            $imagen = $fecha->getTimestamp() . "_" . $files['newimagen']['name'];
            $imagen_temp = $files['newimagen']['tmp_name'];
            move_uploaded_file($imagen_temp, __DIR__ . "/../storage/projects/" . $imagen);
        }
        
        $project->update();
        redirect("/projects");
    }

    public function delete($id)
    {
        $project = new Project();
        $actProject = $this->getById($id);

        unlink(__DIR__ . "/../storage/projects/" . $actProject[0]['imagen']);

        $project->delete($id);
        redirect("/projects");
    }
}
