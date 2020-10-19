<?php

/* Outils génerale */
function getListeTarification() {
    include "pdo.php";

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
function verifTarifExiste($codeDuree, $categoProd) {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM tarification WHERE codeDuree = :codeDuree AND categoProd = :categoProd) > 0, TRUE, FALSE)');
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
    $resultat = $requete->fetchall();
    return $resultat[0][0];
}
function verifcodeDureeValide($codeDuree) {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM duree WHERE codeDuree = :codeDuree) > 0, TRUE, FALSE)');
    $requete->execute(["codeDuree" => $codeDuree]);
    $resultat = $requete->fetchall();
    if ($resultat[0][0] == true) {
        return $resultat[0][0];
    } else {
        header("location: index.php?action=T&crud=r&msg=1");
    }
}
function verifCategoProdValide($categoProd) {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM catProd WHERE categoProd = :categoProd) > 0, TRUE, FALSE)');
    $requete->execute(["categoProd" => $categoProd]);
    $resultat = $requete->fetchall();
    if ($resultat[0][0] == true) {
        return $resultat[0][0];
    } else {
        header("location: index.php?action=T&crud=r&msg=2");
    }
}

/* CREATE */
function getListeDuree() {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT codeDuree FROM DUREE');
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
}
function getListeCategorie() {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT categoProd FROM CatProd');
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
}
function ajoutTarif($codeDuree, $categoProd, $prix) {
    include "pdo.php";
    $requete = $pdo->prepare('INSERT INTO tarification VALUES (:codeDuree, :categoProd, :prix)');
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd, "prix" => $prix]);
}

/* READ */
/* function getListeTarification() {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT * FROM TARIFICATION');
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
} */

/* UPDATE */
function getTarif($codeDuree, $categoProd) {
    include "pdo.php";
    $requete = $pdo->prepare('SELECT * FROM Tarification WHERE codeDuree = :codeDuree AND categoProd = :categoProd');
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
    $resultat = $requete->fetchall();
    return $resultat[0];

}
function updateTarif($codeDuree, $categoProd, $prix) {
    include "pdo.php";
    $requete = $pdo->prepare('UPDATE Tarification SET prixLocation = :prix WHERE codeDuree = :codeDuree AND categoProd = :categoProd ');
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd, "prix" => $prix]);
}

/* DELETE */
function deleteTarif($codeDuree,$categoProd) {
    include "pdo.php";
    $requete = $pdo->prepare('DELETE FROM `tarification` WHERE codeDuree = :codeDuree AND categoProd = :categoProd');
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
}
?>


