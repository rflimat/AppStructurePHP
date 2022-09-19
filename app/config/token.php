<?php
    function setToken(){
        $hora = date('H:i');
        $session_id = session_id();
        $token = hash('sha256', $hora.$session_id);
        
        $_SESSION['token'] = $token;
    }

    setToken();

    function verifyToken($token){
        if($_SESSION['token'] == $token){
            return true;
        } else {
            redirect("/error");
        }
    }
?>