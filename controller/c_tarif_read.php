<?php
include "model/m_tarif.php";
$listeTarification = getListeTarification();
$html= "";
foreach ($listeTarification as $tarification) {
    $html.='
    <tr>
        <td class="align-middle">'.$tarification["codeDuree"].'</td>
        <td class="align-middle">'.$tarification["categoProd"].'</td>
        <td class="align-middle">'.$tarification["prixLocation"].' €</td>
        <td class="align-middle">
        <a class="btn btn-danger align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp='.$tarification["categoProd"].'" role="button"><span aria-hidden="true">&times;</span></a>
        <a class="btn btn-primary align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp='.$tarification["categoProd"].'" role="button">Modifier</a>
        </td>
    </tr>';
}
$view = "tarif";
?>
