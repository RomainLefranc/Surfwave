<?php
include "model/m_tarif.php";

/* $listeTarification = getListeTarification();
$html= "";
foreach ($listeTarification as $tarification) {
    $html.='
    <tr>
        <th class="align-middle">'.$tarification["codeDuree"].'</th>
        <th class="align-middle">'.$tarification["categoProd"].'</th>
        <th class="align-middle">'.$tarification["prixLocation"].' €</th>
        <th class="align-middle">
        <a class="btn btn-danger align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp='.$tarification["categoProd"].'" role="button"><span aria-hidden="true">&times;</span></a>
        <a class="btn btn-primary align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp='.$tarification["categoProd"].'" role="button">Modifier</a>
        </th>
    </tr>';
} */
$listeTarification = getListeTarification();
$htmlTarif = '';
foreach ($listeTarification as $tarification) {

    if($tarification["prixLocationPS"] == null) {
        $tarification["prixLocationPS"] = '
        <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=PS" role="button">Créer</a>';
    } else {
        $tarification["prixLocationPS"] .= '
         <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=PS" role="button">Modifier</a>
        <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><span aria-hidden="true">&times;</span></a>';
    }

    if($tarification["prixLocationBB"] == null) {
        $tarification["prixLocationBB"] = '
        <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=BB" role="button">Créer</a>';
    } else {
        $tarification["prixLocationBB"] .= '
         <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=BB" role="button">Modifier</a>
        <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><span aria-hidden="true">&times;</span></a>';
    }
    if($tarification["prixLocationCO"] == null) {
        $tarification["prixLocationCO"] = '
        <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=CO" role="button">Créer</a>';
    } else {
        $tarification["prixLocationCO"] .= '
         <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=CO" role="button">Modifier</a>
        <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><span aria-hidden="true">&times;</span></a>';
    }

    $htmlTarif.= 
    '<tr>
        <td class="align-middle">'.$tarification["libDuree"].'</td>
        <td class="align-middle">'.$tarification["prixLocationPS"].'</td>
        <td class="align-middle">'.$tarification["prixLocationBB"].'</td>
        <td class="align-middle">'.$tarification["prixLocationCO"].'</td>
    </tr>';
}

$view = "tarif";
?>
