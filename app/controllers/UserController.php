<?php
require_once __DIR__ . "/../models/User.php";

class UserController
{
    public function signup($req)
    {
        $user = new User();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->user = $req['user'];
        $user->password = hash('SHA256', $req['password']);
        $user->token = bin2hex(openssl_random_pseudo_bytes(16));
        $user->save();

        redirect('/login');
    }
    public function login($req)
    {
        $user = $req['user'];
        $password = hash('SHA256', $req['password']);
        echo $password;

        $objUser = new User();
        $result = $objUser->validateUser($user, $password);

        if ($result) {
            setSession($user);
            redirect('/projects');
        } else {
            redirect('/projects');
        }
    }
    public function validateEmail($req)
    {
        $email = $req['email'];
        $objUser = new User();
        $result = $objUser->validateEmail($email);

        if ($result) {
            $token = $objUser->getToken($email);
            
            $mensaje = "Recuperacion de contraseña
            Ingrese al siguiente link para cambiar por una nueva contraseña.
            http://localhost/AppStructurePHP/public/resetpassword?id=".$token[0]['id']."&token=".$token[0]['token_password']."
            Si usted no solicito, ignorelo";
            
            $headers = 'From: '.$_ENV['SUBJECT']. "\r\n" .
            'Reply-To: '.$_ENV['SUBJECT'].  "\r\n" .
            'X-Mailer: PHP/' . phpversion().
            'Content-type: text/html; charset=iso-8859-1';

            $enviado = mail($email, "Recuperacion de contraseña", $mensaje, $headers);

            if($enviado) {
                echo "<script>alert('Correo de recuperacion de contraseña enviado')</script>";
            } else {
                echo "<script>alert('Error en envio de correo de recuperacion de contraseña')</script>";
            }
        } else {
            echo "<script>alert('Email no valido')</script>";
        }
    }
    public function validateToken($req)
    {
        $id = $req['id'];
        $token = $req['token'];

        $objUser = new User();
        $result = $objUser->validateToken($id, $token);

        if ($result) {
            view("resetpassword", ['id' => $id]);
        } else {
            echo "<script>alert('Datos no validos')</script>";
        }
    }

    public function changePassword($req)
    {
        $id = $req['id'];
        $newPassword = hash('SHA256', $req['password']);
        $cbnewPassword = hash('SHA256', $req['cbpassword']);

        if($newPassword == $cbnewPassword) {
            $objUser = new User();
            $validate = $objUser->validatePassword($id, $newPassword);
            if($validate){
                $objUser->changePassword($id, $newPassword);
                echo "<script>alert('Contraseña cambiada. Ir a login')</script>";
                redirect('/login');
            } else {
                echo "<script>alert('Contraseña ya registrada por el usuario')</script>";
            }
        } else {
            echo "<script>alert('Contraseñas ingresadas son diferentes')</script>";
        }
    }
}
