<?php

session_start();
include "controller/controleur.php";/* Outil permettant la verification des parametre reçus */
$pages = array (["A","accueil"],["ad","admin"],['D','deconnexion']);
$controlExiste = false;
if (verifAction()) {
    foreach ($pages as $page) {
        if ($page[0] == $_GET['action']) {
            include "controller/c_$page[1].php";
            $controlExiste = true;
        }
    }
    if (!$controlExiste) {
        include "view/v_404.php";
    }
};
?>