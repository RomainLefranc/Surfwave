<?php
include "model/m_accueil.php";

$listeTarification = getListeTarification();
$htmlTarif = '';
foreach ($listeTarification as $tarification) {
    $htmlTarif.= 
    '<tr>
        <td class="align-middle">'.$tarification["libDuree"].'</td>
        <td class="align-middle">'.$tarification["prixLocationPS"].' €</td>
        <td class="align-middle">'.$tarification["prixLocationBB"].' €</td>
        <td class="align-middle">'.$tarification["prixLocationCO"].' €</td>
    </tr>';
}

$listeEquipier = getListeEquipier();
$htmlEquipier = '';
foreach ($listeEquipier as $equipier) {
    $htmlEquipier.='
    <div class="col-lg-4 col-md-6 col-sm-6">

        <img src="media/'.$equipier['surnomEq'].'.jpg" alt="'.$equipier['surnomEq'].'" class="rounded-circle img-fluid qdp">
        <p class="nom">'.$equipier['surnomEq'].'</p>
        <p class="role">'.$equipier['fonctionEq'].'</p>
    </div>
    ';
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