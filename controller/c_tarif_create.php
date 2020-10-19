<?php
include "model/m_tarif.php";



$codeDureeInput = htmlspecialchars($_GET['cd']);
$categoProdInput = htmlspecialchars($_GET['cp']);


if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && !verifTarifExiste($codeDureeInput, $categoProdInput)) {

    if (isset($_POST['prix'])) {

        $prixOutput = htmlspecialchars($_POST['prix']);

        if (verifPrix($prixOutput)) {
            ajoutTarif($codeDureeInput, $categoProdInput, $prixOutput);
            $_POST['msg'] = 1;        
        }
    }
/*     $view = "tarif"; */
};

/* $listeDuree = getListeDuree();
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
} */

$view = 'tarif'
?>