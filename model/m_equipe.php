<?php
    /* READ + */
    function getListeEquipier() {
        include "pdo.php";

        $requete = $pdo->prepare(
            'SELECT codeEq, surnomEq,nomEq, fonctionEq FROM equipier'
        );
        $requete->execute();
        $resultat = $requete->fetchall();
        return $resultat;    
    }
    /* OUTILS */
    function verifCodeEqExiste($codeEq) {
        include "pdo.php";
        $requete = $pdo->prepare('SELECT IF((SELECT COUNT(*) FROM equipier WHERE codeEq = :codeEq) > 0, TRUE, FALSE)');
        $requete->execute(["codeEq" => $codeEq]);
        $resultat = $requete->fetchall();
        return $resultat[0][0];     
    }
    /* READ */
    function getEquipier($codeEq) {
        include "pdo.php";

        $requete = $pdo->prepare(
            'SELECT codeEq, surnomEq, nomEq, fonctionEq FROM equipier WHERE codeEq = :codeEq'
        );
        $requete->execute(['codeEq' => $codeEq]);
        $resultat = $requete->fetchall();
        return $resultat[0];      
    }
    /* DELETE */
    function deleteEquipier($codeEq) {
        include "pdo.php";

        $requete = $pdo->prepare(
            'DELETE FROM equipier WHERE codeEq = :codeEq '
        );
        $requete->execute(['codeEq' => $codeEq]);
    }
    /* UPDATE */
    function updateEquipier($codeEq, $surnomEq, $nomEq, $fonctionEq) {
        include "pdo.php";

        $requete = $pdo->prepare(
            'UPDATE equiper SET surnomEq = :surnomEq,nomEq = :nomEq, fonctionEq = :fonctionEq WHERE codeEq = :codeEq'
        );
        $requete->execute(['codeEq' => $codeEq, 'surnomEq' => $surnomEq, 'nomEq' => $nomEq, 'fonctionEq' => $fonctionEq]);    
    }
    /* CREATE */
    function AjoutEquipier($codeEq, $surnomEq, $nomEq, $fonctionEq) {
        include "pdo.php";

        $requete = $pdo->prepare(
            'INSERT INTO equipier VALUES (:codeEq, :surnomEq, :nomEq, :fonctionEq)'
        );
        $requete->execute(['codeEq' => $codeEq, 'surnomEq' => $surnomEq, 'nomEq' => $nomEq, 'fonctionEq' => $fonctionEq]);    
    }

?>