<?php
    function redirect($route) {
        $appUrl = getAppUrl();
        header("location:".$appUrl.$route);
    }
?>