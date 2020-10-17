<?php
include "model/m_accueil.php";
$listeTarification = getListeTarification();
$html = '';
foreach ($listeTarification as $tarification) {
    $html.= 
    '<tr>
        <td class="align-middle">'.$tarification["libDuree"].'</td>
        <td class="align-middle">'.$tarification["prixLocationPS"].' €</td>
        <td class="align-middle">'.$tarification["prixLocationBB"].' €</td>
        <td class="align-middle">'.$tarification["prixLocationCO"].' €</td>
    </tr>';
}
if (isset($_POST["login"]) && isset($_POST["mdp"])) {
    if (verifUserExiste()) {
        $_SESSION["user"] = $_POST["login"];
        header ('location: index.php?action=AD');
    } else {
        $_POST["erreur"] = 1;
        $view = "accueil";
    }
} else {
    $view = "accueil";
}


?>