<?php
    include "model/m_accueil.php";

    /* Préparation de la liste des tarifs */
    $listeTarification = getListeTarification();
    $htmlTarif = '';
    foreach ($listeTarification as $tarification) {

        $tarification["prixLocationPS"] = testVide($tarification["prixLocationPS"]);
        $tarification["prixLocationBB"] = testVide($tarification["prixLocationBB"]);
        $tarification["prixLocationCO"] = testVide($tarification["prixLocationCO"]);

        $htmlTarif.= 
        '<tr>
            <td class="align-middle">'.$tarification["libDuree"].'</td>
            <td class="align-middle">'.$tarification["prixLocationPS"].'</td>
            <td class="align-middle">'.$tarification["prixLocationBB"].'</td>
            <td class="align-middle">'.$tarification["prixLocationCO"].'</td>
        </tr>';
    }

    /* Préparation de la liste des equipiers */
    $listeEquipier = getListeEquipier();
    $htmlEquipier = '';
    foreach ($listeEquipier as $equipier) {
        $htmlEquipier.='
        <div class="col-lg-4 col-md-6 col-sm-6">
            <img src="model/data/'.$equipier["codeEq"].'.jpg" equipier='.$equipier["codeEq"].' alt="'.$equipier["surnomEq"].'" class="rounded-circle img-fluid qdp">
            <p class="nom">'.$equipier["surnomEq"].'</p>
            <p class="role">'.$equipier["fonctionEq"].'</p>
        </div>
        ';
    }

    if (isset($_POST["login"]) && isset($_POST["mdp"])) {
        /* Récuperation des données du formulaire envoyé */
        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);
        /* Verification de la validité du login et mdp */
        if (verifUserExiste($login, $mdp)) {
            $_SESSION["user"] = $login;
            header ('location: index.php?action=AD');
        } else {
            $_POST["erreur"] = 1;
        }
    }
    
    $view = "accueil";
?>