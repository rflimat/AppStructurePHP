<?php
    session_start();

    function setSession($user) {
        $_SESSION['user'] = $user;
    }

    function getSession() {
        if(isset($_SESSION['user'])){
            return isset($_SESSION['user']);
        } else{
            return null;
        }
    }

    function verifySession() {
        if(isset($_SESSION['user']) == null) {
            redirect('/login');
            return false;
        } else {
            return true;
        }
    }

    function deleteSession() {
        $_SESSION['user'] = null;
        redirect('/login');
    }
?>