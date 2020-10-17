<?php

if (verifSession()) {
    $user = htmlspecialchars($_SESSION["user"]);
    $view = 'admin';
} else {
    $view = '403';
}
?>