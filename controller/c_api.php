<?php
include "model/m_api.php";

if (isset($_GET['equipier'])) {
    $equipierInput = htmlspecialchars($_GET['equipier']);
    $resultat = getQDP($equipierInput);
} else {
    $resultat['success'] = false;
    $resultat['message'] = "Il manque un parametre";
}
$view = 'api';
?>