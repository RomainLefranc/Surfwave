<?php
function verifAction() {
    if (isset($_GET["action"])) {
       return true;
    } else {
        header("location: index.php?action=A");
    }
};
function verifSessionAdmin() {
    if ($_SESSION['role'] == 1) {
        return true;
    } else {
        $view = "403";
    }
};
function verifVue() {
    if (isset($_GET["vue"]) && !empty($_GET["vue"])) {
        return true;
    } else {
        header("location : index.php?action=L&erreur=1");
    }
};
function affichageInterne($variable) {
     if ($variable == 1) {
         return "oui";
     } else {
         return "non";
     }
};
?>