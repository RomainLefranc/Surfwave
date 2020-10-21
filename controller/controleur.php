<?php

    /* Verifie que l'action est bien setté */
    function verifAction() {
        if (isset($_GET["action"])) {
        return true;
        } else {
            header("location: index.php?action=A");
        }
    };

    /* Verifie que la session est bien setté */
    function verifSession() {
        if (isset($_SESSION["user"])) {
            return true;
        } else {
            $view = "403";
        }
    }

    /* Verifie que le prix est supérieur à 0 */
    function verifPrix() {
        if (intval($_POST['prix']) > 0 && intval($_POST['prix']) < 99999999999.99) {
            return true;    
        } else {
            return false;
        }
    }

?>