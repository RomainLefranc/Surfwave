<?php
include "model/m_tarif.php";

$codeDureeInput = htmlspecialchars($_GET['cd']);
$categoProdInput = htmlspecialchars($_GET['cp']);

if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && verifTarifExiste($codeDureeInput, $categoProdInput)) {

    if (isset($_POST['prix'])) {

        $prixOutput = htmlspecialchars($_POST['prix']);

        if (verifPrix($prixOutput)) {
            updateTarif($codeDureeInput, $categoProdInput, $prixOutput);
            $_POST['msg'] = 1;        
        }
        
    }
    $resultat = getTarif($codeDureeInput, $categoProdInput);
    $view = "tarif";
};
?>