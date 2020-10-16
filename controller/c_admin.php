<?php
if (isset($_SESSION["user"])) {
    $user = htmlspecialchars($_SESSION["user"]);
    $view = 'admin';
} else {
    $view = '403';
}
include "view/v_$view.php";
?>