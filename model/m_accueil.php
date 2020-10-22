<?php
    /* Récupère la liste des tarifications */
    function getListeTarification() {
        include "pdo.php";

        $requete = $pdo->prepare(
            'SELECT libDuree,
            (SELECT prixLocation FROM TARIFICATION WHERE categoProd = "PS" AND TARIFICATION.codeDuree = Duree.codeDuree) AS prixLocationPS,
            (SELECT prixLocation FROM TARIFICATION WHERE categoProd = "BB" AND TARIFICATION.codeDuree = Duree.codeDuree) AS prixLocationBB,
            (SELECT prixLocation FROM TARIFICATION WHERE categoProd = "CO" AND TARIFICATION.codeDuree = Duree.codeDuree) AS prixLocationCO 
            FROM DUREE 
            ORDER BY RIGHT(codeDuree,1)
            '
        );
        $requete->execute();
        $resultat = $requete->fetchall();
        return $resultat;
    }
    function verifUserExiste ($login,$mdp) {
        $listeUsers = array (
            ["1","1"],
            ["Lefranc46@gmail.com","1"]
        );
        $userExiste = false;
        foreach ($listeUsers as $user) {
            if ($user[0] == $login && $user[1] == $mdp) {
                $userExiste = true;
            }
        }
        return $userExiste;
    }
    function getListeEquipier() {
        include "pdo.php";

        $requete = $pdo->prepare(
            'SELECT codeEq, surnomEq, fonctionEq FROM equipier'
        );
        $requete->execute();
        $resultat = $requete->fetchall();
        return $resultat;    
    }
?>


