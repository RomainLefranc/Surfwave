<?php
if (verifSession() && verifCrud()) {

    switch (true) {
        case $_GET["crud"] == "c":
            include "controller/c_tarif_create.php";
            break;
        case $_GET["crud"] == "r":
            include "controller/c_tarif_read.php";
            break;
        case $_GET["crud"] == "u":
            include "controller/c_tarif_update.php";
            break;
        case $_GET["crud"] == "d":
            include "controller/c_tarif_delete.php";
            break;
        default:
            $view ="404";
            break;
    };
}
?>