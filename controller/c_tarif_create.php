<?php
include "model/m_tarif.php";

if (isset($_POST['prix']) && isset($_POST['categoProd']) && isset($_POST['duree'])) {   

    $categoProdOutput = htmlspecialchars($_POST['categoProd']);
    $codeDureeOutput = htmlspecialchars($_POST['duree']);
    $prixOutput = htmlspecialchars($_POST['prix']);
    
    if (verifcodeDureeValide($codeDureeOutput) && verifCategoProdValide($categoProdOutput) && verifPrix($prixOutput) && !verifTarifExiste($codeDureeOutput, $categoProdOutput)) {
        ajoutTarif($codeDureeOutput, $categoProdOutput, $prixOutput);
        $_POST['msg'] = 1;
    } else {
        $_POST['msg'] = 2;
    }
};

$listeDuree = getListeDuree();
$selectDuree = '';
foreach ($listeDuree as $duree) {
    $selectDuree.=
    '<option value="'.$duree['codeDuree'].'">'.$duree['codeDuree'].'</option>';
}

$listeCategoProd = getListeCategorie();
$selectCatego = '';
foreach ($listeCategoProd as $categoProd) {
    $selectCatego.=
    '<option value="'.$categoProd['categoProd'].'">'.$categoProd['categoProd'].'</option>';
}

$view = 'tarif'
?>