<?php
    include "pdo.php";

    /* 
    M : Récupère la liste des tarifications
    O : array contenant les données
    I : /
     */
    function getListeTarification() {
        global $pdo;
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
    /* 
    M : Compare les valeur en input avec la BDD (simulation)
    O : booléen
    I : le login saisi et le mdp saisi
     */
    function verifUserExiste ($login,$mdp) {
        $listeUsers = array (
            ["login" => "1","mdp" => "1"],
            ["login" => "Lefranc46@gmail.com","mdp" => "1"]
        );
        $userExiste = false;
        foreach ($listeUsers as $user) {
            if ($user["login"] == $login && $user["mdp"] == $mdp) {
                $userExiste = true;
            }
        }
        return $userExiste;
    }
    /* 
    M : Récupère la liste des equipiers
    O : array contenant les données
    I : /
     */
    function getListeEquipier() {
        global $pdo;

        $requete = $pdo->prepare(
            'SELECT codeEq, surnomEq, fonctionEq FROM equipier'
        );
        $requete->execute();
        $resultat = $requete->fetchall();
        return $resultat;    
    }
?>


