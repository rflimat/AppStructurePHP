<?php
    class Project{ 
        public $id;
        public $nombre;
        public $imagen;
        public $descripcion;

        public function save(){
            $objConexion = new Conexion();
            $sql = "INSERT INTO projects (name, image, description) VALUES ('$this->nombre', '$this->imagen', '$this->descripcion');";
            $objConexion->execute($sql);
        }

        public static function get(){
            $objConexion = new Conexion();
            $sql = "SELECT *FROM projects";
            $resultado = $objConexion->query($sql);
            return $resultado;
        }

        public static function getById($id){
            $objConexion = new Conexion();
            $sql = "SELECT *FROM projects WHERE id=$id";
            $resultado = $objConexion->query($sql);
            return $resultado;
        }

        public static function getByName($name){
            $objConexion = new Conexion();
            $sql = "SELECT *FROM projects WHERE name LIKE '%$name%'";
            $resultado = $objConexion->query($sql);
            return $resultado;
        }

        public function update(){
            $objConexion = new Conexion();
            $sql = "UPDATE projects SET name='$this->nombre', image='$this->imagen', description='$this->descripcion' WHERE id=$this->id";
            $objConexion->execute($sql);
        }

        public function delete($id){
            $objConexion = new Conexion();
            $sql = "DELETE FROM projects WHERE id=$id";
            $objConexion->execute($sql);
        }

    }
?>