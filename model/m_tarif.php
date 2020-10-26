<?php
    include "pdo.php";
    /* Outils génerale */

    /* 
    M : Verifie qu'il existe une association entre le code durée et le categorie de produit
    O : booléen
    I : code Durée et categoPtod
     */
    function verifTarifExiste($codeDuree, $categoProd) {
        global $pdo;
        $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM tarification WHERE codeDuree = :codeDuree AND categoProd = :categoProd) > 0, TRUE, FALSE)');
        $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
        $resultat = $requete->fetchall();
        return $resultat[0][0];
    }
    /* 
    M : Verifie qu'il existe un code durée dans la table duree
    O : booléen
    I : codeDurée
     */
    function verifcodeDureeValide($codeDuree) {
        global $pdo;
        $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM duree WHERE codeDuree = :codeDuree) > 0, TRUE, FALSE)');
        $requete->execute(["codeDuree" => $codeDuree]);
        $resultat = $requete->fetchall();
        if ($resultat[0][0] == true) {
            return $resultat[0][0];
        } else {
            header("location: index.php?action=T&msg=1");
        }
    }
    /* 
    M : Verifie qu'il existe un categoProd dans la table catProd
    O : booléen
    I : categoProd
     */
    function verifCategoProdValide($categoProd) {
        global $pdo;
        $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM catProd WHERE categoProd = :categoProd) > 0, TRUE, FALSE)');
        $requete->execute(["categoProd" => $categoProd]);
        $resultat = $requete->fetchall();
        if ($resultat[0][0] == true) {
            return $resultat[0][0];
        } else {
            header("location: index.php?action=T&msg=2");
        }
    }

    /* READ + */
    /* 
    M : Récupère toutes les entrées de la table tarifications
    O : array
    I : /
     */
    function getListeTarification() {
        global $pdo;
        $requete = $pdo->prepare(
            'SELECT codeDuree,libDuree,
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

    /* CREATE */
    /* 
    M : Créer une entrée dans la table tarification
    O : /
    I : codeDurée, categoProd, prix
     */
    function ajoutTarif($codeDuree, $categoProd, $prix) {
        global $pdo;
        $requete = $pdo->prepare('INSERT INTO tarification VALUES (:codeDuree, :categoProd, :prix)');
        $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd, "prix" => $prix]);
    }

    /* READ */
    /* 
    M : Récupère une entrée dans la table tarification
    O : array
    I : codeDurée, categoProd
    */
    function getTarif($codeDuree, $categoProd) {
        global $pdo;
        $requete = $pdo->prepare('SELECT Tarification.categoProd, codeDuree,libDuree,prixLocation FROM Tarification INNER JOIN catProd ON Tarification.categoProd = catProd.categoProd WHERE codeDuree = :codeDuree AND Tarification.categoProd = :categoProd');
        $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
        $resultat = $requete->fetchall();
        return $resultat[0];
    }

    /* UPDATE */
    /* 
    M : modifie une entrée dans la table tarification
    O : /
    I : codeDurée, categoProd, prix
    */
    function updateTarif($codeDuree, $categoProd, $prix) {
        global $pdo;
        $requete = $pdo->prepare('UPDATE Tarification SET prixLocation = :prix WHERE codeDuree = :codeDuree AND categoProd = :categoProd ');
        $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd, "prix" => $prix]);
    }

    /* DELETE */
    /* 
    M : Supprime une entrée dans la table tarification
    O : /
    I : codeDurée, categoProd, prix
    */
    function deleteTarif($codeDuree,$categoProd) {
        global $pdo;
        $requete = $pdo->prepare('DELETE FROM `tarification` WHERE codeDuree = :codeDuree AND categoProd = :categoProd');
        $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
    }
?>


