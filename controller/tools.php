<?php

    /* Verifie que le prix est supérieur à 0 et est inferieur a la limite de ce que BDD peut stocker */
    function verifPrix() {
        if (intval($_POST['prix']) > 0 && intval($_POST['prix']) < 999.99) {
            return true;    
        } else {
            return false;
        }
    }
    /* Verifie la valeur du prix de location */
    function testVide($prixLocation) {
        if ($prixLocation == null) {
            return 'Non renseigné';
        } else {
            return $prixLocation.' €';
        }

    }
    function definitionBoutonCrud($prixLocation,$codeDuree,$colonne) {
        $crud = '';
        if($prixLocation == null) {
            $crud = '
            <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="fas fa-plus"></i></a>';
        } else {
            $crud = '
            <div class="btn-group" role="group">
                <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="fas fa-edit"></i></a>
                <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=r&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="far fa-eye"></i></a>
                <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="fas fa-times"></i></a>
            </div>';
        } 
        return $crud;           
    }
?>