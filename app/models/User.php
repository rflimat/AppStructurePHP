<?php
    class User{
        public $name;
        public $email;
        public $user;
        public $password;
        public $token;
        public $request;

        public function save(){
            $conexion = new Conexion();
            $sql = "INSERT INTO users (name, email, user, password, token) VALUES ('$this->name', '$this->email', '$this->user', '$this->password', '$this->token')";
            $conexion->execute($sql);
        }

        public function validateUser($user, $password){
            $conexion = new Conexion();
            $sql = "SELECT *FROM users WHERE user='$user' AND password='$password'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? false : true;
        }

        public function validateEmail($email){
            $conexion = new Conexion();
            $sql = "SELECT *FROM users WHERE email='$email'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? false : true;
        }

        public function validatePassword($id, $newPassword){
            $conexion = new Conexion();
            $sql = "SELECT password FROM users WHERE id='$id' AND password='$newPassword'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? true : false;
        }

        public function validateToken($id, $token){
            $conexion = new Conexion();
            $sql = "SELECT *FROM users WHERE id='$id' AND token='$token'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? false : true;
        }

        public function getToken($email){
            $conexion = new Conexion();
            $sql = "SELECT id, token FROM users WHERE email='$email'";
            $resultado = $conexion->query($sql);
            $conexion->execute("UPDATE users SET request=1 WHERE email='$email'");
            return $resultado;
        }

        public function changePassword($id, $newPassword){
            $conexion = new Conexion();
            $sql = "UPDATE users SET password='$newPassword', request=0 WHERE id=$id";
            $conexion->execute($sql);
        }
    }
?>