<?php
    function getQDP($codeEq) {
        include "pdo.php";
        $requete = $pdo->prepare('SELECT libQuest, reponse FROM qdp INNER JOIN equipier ON qdp.codeEq = equipier.codeEq INNER JOIN question ON qdp.idquest = question.idquest WHERE equipier.codeEq = :codeEq');
        $requete->execute(["codeEq" => $codeEq]);
        $resultat = $requete->fetchall(); 
        $retour['success'] = true;
        $retour['message'] = "Voici les qdp";
        $retour['resultat']['nb'] = count($resultat);
        $retour['resultat']['qdp'] = $resultat;
        return $retour;
    }
?>