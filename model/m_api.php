<?php
    function getQDP($surnomEq) {
        include "pdo.php";
        $requete = $pdo->prepare('SELECT libQuest, reponse FROM qdp INNER JOIN equipier ON qdp.codeEq = equipier.codeEq INNER JOIN question ON qdp.idquest = question.idquest WHERE equipier.surnomEq = :surnomEq');
        $requete->execute(["surnomEq" => $surnomEq]);
        $retour['success'] = true;
        $retour['message'] = "Voici les qdp";
        $retour['resultat']['qdp'] = $requete->fetchall(); 
        return $retour;
    }
?>