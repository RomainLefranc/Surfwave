<?php
include "model/m_tarif.php";

$codeDureeInput = htmlspecialchars($_GET['cd']);
$categoProdInput = htmlspecialchars($_GET['cp']);

if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput)) {
    if (verifTarifExiste($codeDureeInput, $categoProdInput)) {
        if (isset($_POST['prix'])) {
            $prix = htmlspecialchars($_POST['prix']);
            updateTarif($codeDureeInput, $categoProdInput, $prix);
            $_POST['msg'] = 1;
        }
        $resultat = getTarif($codeDureeInput, $categoProdInput);
    }
    $view = "tarif";
};
?>