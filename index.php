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

/* if (isset($_GET['action'])) {
    switch (true) {
        case $_GET['action'] == 'A':
            include 'controller/c_accueil.php';
            include "view/v_$view.php";
            break;
        case $_GET['action'] == 'AD':
            include 'controller/c_admin.php';
            include "view/v_$view.php";
            break;       
        default:
            include 'view/v_404.php';
            break;
    }
} else {
    header("location: index.php?action=A");
} */

?>