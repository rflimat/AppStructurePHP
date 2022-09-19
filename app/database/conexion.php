<?php
    class Conexion{
        private $server;
        private $database;
        private $user;
        private $password;
        private $conexion;

        public function __construct(){
            try{
                $this->server = $_ENV['SERVER'];
                $this->port = $_ENV['PORT'];
                $this->database = $_ENV['DATABASE'];
                $this->user = $_ENV['USER'];
                $this->password = $_ENV['PASSWORD'];

                $this->conexion = new PDO("mysql:host=$this->server$this->port; dbname=$this->database", $this->user, $this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $error){
                return "Falla de conexión ".$error;
            }
        }

        //Insertar/actualizar/eliminar
        public function execute($sql){
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }

        public function query($sql){
            $sentence = $this->conexion->prepare($sql);
            $sentence->execute();
            return $sentence->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>