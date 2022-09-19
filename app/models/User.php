<?php
    class User{
        public function setUser($nombre, $email, $user, $password, $token_password){
            $conexion = new Conexion();
            $sql = "INSERT INTO `users` (`id`, `nombre`, `email`, `user`, `password`, `token_password`) VALUES (NULL, '$nombre', '$email', '$user', '$password', '$token_password');";
            $conexion->execute($sql);
        }

        public function validateUser($user, $password){
            $conexion = new Conexion();
            $sql = "SELECT *FROM `users` WHERE user='$user' AND password='$password'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? false : true;
        }

        public function validateEmail($email){
            $conexion = new Conexion();
            $sql = "SELECT *FROM `users` WHERE email='$email'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? false : true;
        }

        public function validatePassword($id, $newPassword){
            $conexion = new Conexion();
            $sql = "SELECT `password` FROM `users` WHERE id='$id' AND `password`='$newPassword'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? true : false;
        }

        public function validateToken($id, $token){
            $conexion = new Conexion();
            $sql = "SELECT *FROM `users` WHERE id='$id' AND token_password='$token'";
            $resultado = $conexion->query($sql);
            return $resultado == null ? false : true;
        }

        public function getToken($email){
            $conexion = new Conexion();
            $sql = "SELECT `id`, `token_password` FROM `users` WHERE email='$email'";
            $resultado = $conexion->query($sql);
            $conexion->execute("UPDATE users SET password_request=1 WHERE email='$email'");
            return $resultado;
        }

        public function changePassword($id, $newPassword){
            $conexion = new Conexion();
            $sql = "UPDATE users SET `password`='$newPassword', `password_request`=0 WHERE id='$id'";
            $conexion->execute($sql);
        }
    }
?>