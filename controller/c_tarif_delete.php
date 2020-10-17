<?php
include "model/m_tarif.php";

$codeDureeInput = htmlspecialchars($_GET['cd']);
$categoProdInput = htmlspecialchars($_GET['cp']);

if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && verifTarifExiste($codeDureeInput, $categoProdInput)) {
    deleteTarif($codeDureeInput,$categoProdInput);
    header("location: index.php?action=T&crud=r&msg=4");
};
?>