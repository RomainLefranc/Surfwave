<?php
    if (isset($_SESSION['user'])) {

        include "model/m_accueil.php";

        /* Préparation de la liste des tarifs */
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
        
        /* Préparation de la liste des equipiers */
        $listeEquipier = getListeEquipier();
        $htmlEquipier = '';
        foreach ($listeEquipier as $equipier) {
            $htmlEquipier.='
            <div class="col-lg-4 col-md-6 col-sm-6">
                <img src="model/data/'.$equipier['surnomEq'].'.jpg" alt="'.$equipier['surnomEq'].'" class="rounded-circle img-fluid qdp">
                <p class="nom">'.$equipier['surnomEq'].'</p>
                <p class="role">'.$equipier['fonctionEq'].'</p>
            </div>
            ';
        }

        $view = 'admin';
    } else {
        $view = '403';
    }
?>