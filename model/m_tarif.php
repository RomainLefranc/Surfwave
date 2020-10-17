<?php

/* READ */
function getListeTarification() {
    include "pdo.php";

    $requete = $pdo->prepare(
        'SELECT * FROM TARIFICATION'
    );
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
}


/* CREATE */
function getListeDuree() {
    include "pdo.php";

    $requete = $pdo->prepare(
        'SELECT codeDuree FROM DUREE'
    );
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
}

function getListeCategorie() {
    include "pdo.php";

    $requete = $pdo->prepare(
        'SELECT categoProd FROM CatProd'
    );
    $requete->execute();
    $resultat = $requete->fetchall();
    return $resultat;
}

function verifTarif() {
    $codeDuree = htmlspecialchars($_POST['duree']);
    $categoProd = htmlspecialchars($_POST['categoProd']);
    $prix = htmlspecialchars($_POST['prix']);
    include "pdo.php";

    $requete = $pdo->prepare(
        'SELECT IF((SELECT COUNT(*) FROM tarification WHERE codeDuree = :codeDuree AND categoProd = :categoProd) > 0, TRUE, FALSE)'
    );
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
    $resultat = $requete->fetchall();
    return $resultat[0][0];
}

function ajoutTarif() {
    $codeDuree = htmlspecialchars($_POST['duree']);
    $categoProd = htmlspecialchars($_POST['categoProd']);
    $prix = htmlspecialchars($_POST['prix']);
    include "pdo.php";

    $requete = $pdo->prepare(
        'INSERT INTO tarification VALUES (:codeDuree, :categoProd, :prix)'
    );
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd, "prix" => $prix]);
}

/* UPDATE */
function verifTarifExiste() {
    $codeDuree = htmlspecialchars($_GET['cd']);
    $categoProd = htmlspecialchars($_GET['cp']);
    include "pdo.php";
    $requete = $pdo->prepare(
        'SELECT IF((SELECT COUNT(*) FROM tarification WHERE codeDuree = :codeDuree AND categoProd = :categoProd) > 0, TRUE, FALSE)'
    );
    $requete->execute(["codeDuree" => $codeDuree, "categoProd" => $categoProd]);
    $resultat = $requete->fetchall();
    return $resultat[0][0];
}
?>