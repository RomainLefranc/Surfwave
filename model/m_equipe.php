<?php
    include "pdo.php";

    function getListeEquipier() {
        global $pdo;
        $requete = $pdo->prepare(
            'SELECT * FROM equipier'
        );
        $requete->execute();
        $resultat = $requete->fetchall();
        return $resultat;
    }

    function verifCodeEqExiste($codeEq) {
        global $pdo;
        $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM equipier WHERE codeEq = :codeEq) > 0, TRUE, FALSE)');
        $requete->execute(['codeEq' => $codeEq]);
        $resultat = $requete->fetchall();
        return $resultat[0][0];    
    } 

    function createEquipier($codeEq,$surnom,$nom,$fonction) {
        global $pdo;
        $requete = $pdo->prepare('INSERT INTO equipier VALUES(:codeEq, :surnom, :nom, :fonction)');
        $requete->execute([
            'codeEq'        => $codeEq,
            "surnom"        => $surnom,
            "nom"           => $nom,
            "fonction"      => $fonction
        ]);    
    }
    function deleteEquipier($codeEq) {
        global $pdo;
        $requete = $pdo->prepare('DELETE FROM equipier WHERE codeEq = :codeEq');
        $requete->execute(['codeEq' => $codeEq]); 
        $chemin = 'model/data/'.$codeEq.'.jpg';
        unlink($chemin);

    }



?>