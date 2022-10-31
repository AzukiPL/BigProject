<?php
    if(!isset($_COOKIE['theme']))   setcookie('theme','dark');
    if(!isset($_COOKIE['accesibility'])) {
        setcookie("fontSize", false);
        setcookie("contrast", false);
    }
?>