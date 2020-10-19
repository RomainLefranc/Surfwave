<?php

session_start();
include "controller/controleur.php";/* Outil permettant la verification des parametre reçus */
$pages = array (["A","accueil"],["AD","admin"],['D','deconnexion'],["T","Tarif"],['API','api']);
$actionExiste = false;
if (verifAction()) {
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
};
?>