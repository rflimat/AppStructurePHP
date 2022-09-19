<?php
require_once __DIR__ . "/../models/Proyecto.php";

class ProyectoController
{
    public function setProyecto($req, $files)
    {
        $nombre = $req['nombre'];
        $descripcion = $req['descripcion'];

        $fecha = new DateTime();
        $imagen = $fecha->getTimestamp() . "_" . $files['imagen']['name'];
        $imagen_temp = $files['imagen']['tmp_name'];
        move_uploaded_file($imagen_temp, __DIR__ . "/../storage/projects/" . $imagen);

        $objProyecto = new Proyecto();
        $objProyecto->setProyecto($nombre, $imagen, $descripcion);
        redirect("/proyectos");
    }

    public function getProyectos()
    {
        $objProyecto = new Proyecto();
        $proyectos = $objProyecto->getProyectos();
        view("projects.php", ['proyectos' => $proyectos]);
    }

    public function getProyectoById($id)
    {
        $objProyecto = new Proyecto();
        $proyecto = $objProyecto->getProyectoById($id);
        return $proyecto;
    }

    public function getProyectoByNombre($nombre)
    {
        $objProyecto = new Proyecto();
        $proyectos = $objProyecto->getProyectoByNombre($nombre);
        view("projects.php", ['proyectos' => $proyectos]);
    }

    public function editProyecto($id) {
        $proyecto = $this->getProyectoById($id);
        view("update.php", ['proyecto' => $proyecto[0]]);
    }

    public function updateProyecto($req, $files)
    {
        $id = $req['id'];
        $nombre = $req['nombre'];
        $imagen = $req['imagen'];
        $descripcion = $req['descripcion'];

        echo $id;
        if ($files['newimagen']['name'] != "") {
            unlink(__DIR__ . "/../storage/projects/" . $imagen);
            $fecha = new DateTime();
            $imagen = $fecha->getTimestamp() . "_" . $files['newimagen']['name'];
            $imagen_temp = $files['newimagen']['tmp_name'];
            move_uploaded_file($imagen_temp, __DIR__ . "/../storage/projects/" . $imagen);
        }

        $objProyecto = new Proyecto();
        $objProyecto->updateProyecto($id, $nombre, $imagen, $descripcion);
        redirect("/proyectos");
    }

    public function deleteProyecto($id)
    {
        $objProyecto = new Proyecto();
        $proyecto = $this->getProyectoById($id);

        unlink(__DIR__ . "/../storage/projects/" . $proyecto[0]['imagen']);

        $objProyecto->deleteProyecto($id);
        redirect("/proyectos");
    }

    public function getApiProyectos()
    {
        $objProyecto = new Proyecto();
        return json_encode($objProyecto->getProyectos());
    }
}
