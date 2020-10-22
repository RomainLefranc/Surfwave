<?php

session_start();
include "controller/tools.php";/* Outils */
$pages = array (["A","accueil"],["AD","admin"],['D','deconnexion'],["T","Tarif"],['API','api'],['E','equipe']);
$actionExiste = false;
if (isset($_GET['action'])) {
    foreach ($pages as $page) {
        if ($page[0] == $_GET['action']) {
            include "controller/c_$page[1].php";
            include "view/v_$view.php";
            $actionExiste = true;
        }
    }
    if (!$actionExiste) {
        include "view/v_404.php";
    }
} else {
    header("location: index.php?action=A");
}
?>