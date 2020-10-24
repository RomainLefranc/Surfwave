<?php
    include "model/m_api.php";

    if (isset($_GET["equipier"])) {
        $equipier = htmlspecialchars($_GET["equipier"]);
        $resultat = getQDP($equipier);
    } else {
        $resultat['success'] = false;
        $resultat['message'] = "Il manque un parametre";
    }
    
    $view = 'api';
?>