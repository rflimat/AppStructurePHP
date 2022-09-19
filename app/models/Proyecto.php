<?php
    class Proyecto{    
        public function setProyecto($nombre, $imagen, $descripcion){
            $objConexion = new Conexion();
            $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
            $objConexion->execute($sql);
        }

        public function getProyectos(){
            $objConexion = new Conexion();
            $sql = "SELECT *FROM `proyectos`";
            $resultado = $objConexion->query($sql);
            return $resultado;
        }

        public function getProyectoById($id){
            $objConexion = new Conexion();
            $sql = "SELECT *FROM `proyectos` WHERE `proyectos`.`id` = ".$id;
            $resultado = $objConexion->query($sql);
            return $resultado;
        }

        public function getProyectoByNombre($nombre){
            $objConexion = new Conexion();
            $sql = "SELECT *FROM `proyectos` WHERE `proyectos`.`nombre` LIKE '%$nombre%'";
            $resultado = $objConexion->query($sql);
            return $resultado;
        }

        public function updateProyecto($id, $nombre, $imagen, $descripcion){
            $objConexion = new Conexion();
            $sql = "UPDATE `proyectos` SET `nombre`='$nombre', `imagen`='$imagen', `descripcion`='$descripcion' WHERE `proyectos`.`id` = ".$id;
            $objConexion->execute($sql);
        }

        public function deleteProyecto($id){
            $objConexion = new Conexion();
            $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` = ".$id;
            $objConexion->execute($sql);
        }

    }
?>