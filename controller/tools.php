<?php

    /* Verifie que le prix est supérieur à 0 et est inferieur a la limite de ce que BDD peut stocker */
    function verifPrix() {
        if (intval($_POST['prix']) > 0 && intval($_POST['prix']) < 99999999999.99) {
            return true;    
        } else {
            return false;
        }
    }

?>