<?php
if (verifSession() && verifCrud()) {
    if ($_GET["crud"] == "c") {
        include "controller/c_tarif_create.php";
    } elseif ($_GET["crud"] == "r") {
        include "controller/c_tarif_read.php";
    } elseif ($_GET["crud"] == "u") {
        include "controller/c_tarif_update.php";
    } elseif ($_GET["crud"] == "d") {
        include "controller/c_tarif_delete.php";
    }else {
        $view ="404";
    }
}
?>