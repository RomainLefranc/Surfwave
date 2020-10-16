<?php

session_start();
include "controller/controleur.php";/* Outil permettant la verification des parametre reçus */
$pages = array (["A","accueil"]);
$controlExiste = false;
if (verifAction()) {
    foreach ($pages as $page) {
        if ($page[0] == $_GET['action']) {
            include "controller/c_$page[1].php";
            $controlExiste = true;
        }
    }
    if (!$controlExiste) {
        include "view/404.php";
    }
};
?>