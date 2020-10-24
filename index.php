<?php

session_start();

include "controller/tools.php";/* Outils */

$navigations = array (
    ["action" => "A",     "controller" => "accueil"],
    ["action" => "AD",    "controller" => "admin"],
    ["action" => "D",     "controller" => "deconnexion"],
    ["action" => "T",     "controller" => "tarif"],
    ["action" => "API",   "controller" => "api"],
    ["action" => "E",     "controller" => "equipe"]
);

$actionExiste = false;
if (isset($_GET["action"])) {
    $action = htmlspecialchars($_GET["action"]);
    foreach ($navigations as $navigation) {
        if ($navigation["action"] == $action) {
            include 'controller/c_'.$navigation["controller"].'.php';
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