<?php
    function view($file, $compact = []) {
        $loader = new \Twig\Loader\FilesystemLoader('../app/views');
        $twig = new \Twig\Environment($loader, []);
        $appUrl = getAppUrl();
        echo $twig->render($file, array_merge(['appUrl' => $appUrl, 'sessionToken' => $_SESSION['token'], 'sessionUser'=> getSession()], $compact));    
    }
?>