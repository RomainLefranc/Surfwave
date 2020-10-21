<?php
include "model/m_tarif.php";

if (verifSession()) {
    if (isset($_GET['crud'])) {
        switch (true) {
            /* CRUD valide */
            case $_GET['crud'] == 'c' || $_GET['crud'] == 'r' || $_GET['crud'] == 'u' ||$_GET['crud'] == 'd':

                $codeDureeInput = htmlspecialchars($_GET['cd']);
                $categoProdInput = htmlspecialchars($_GET['cp']);

                switch (true) {
                    case $_GET['crud'] == 'c':
                        if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && !verifTarifExiste($codeDureeInput, $categoProdInput)) {
                            if (isset($_POST['prix'])) {
                                $prixOutput = htmlspecialchars($_POST['prix']);
                                if (verifPrix($prixOutput)) {
                                    ajoutTarif($codeDureeInput, $categoProdInput, $prixOutput);
                                    /* Msg = Ajout effectué */
                                    header("location: index.php?action=T&msg=6");        
                                } else {
                                    /* Msg = Prix invalide */
                                    $_POST['msg'] = 1;        
                                }   
                            }
                        } else {
                            /* Msg = Tarif déjà existant */
                            header("location: index.php?action=T&msg=5");   
                        }                           
                        break;
                    case $_GET['crud'] == 'c' || $_GET['crud'] == 'r' ||  $_GET['crud'] == 'u' || $_GET['crud'] == 'd':
                        if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && verifTarifExiste($codeDureeInput, $categoProdInput)){
                            switch (true) {
                                case $_GET['crud'] == 'r':
                                    $resultat = getTarif($codeDureeInput,$categoProdInput);
                                    break;
                                case $_GET['crud'] == 'u':
                                    if (isset($_POST['prix'])) {
            
                                        $prixOutput = htmlspecialchars($_POST['prix']);
                                
                                        if (verifPrix($prixOutput)) {
                                            updateTarif($codeDureeInput, $categoProdInput, $prixOutput);
                                            /* Msg = Modification effectué */
                                            $_POST['msg'] = 1;        
                                        } else {
                                            /* Msg = Prix invalide */
                                            $_POST['msg'] = 2;                     
                                        }
                                        
                                    }
                                    $resultat = getTarif($codeDureeInput, $categoProdInput);                                    
                                    break;
                                case $_GET['crud'] == 'd':
                                    deleteTarif($codeDureeInput,$categoProdInput);
                                    /* Msg = Suppression effectué */
                                    header("location: index.php?action=T&msg=3");                                     
                                    break;
                            }
                        } else {
                            /* Msg = Ce tarif n'existe pas */
                            header("location: index.php?action=T&msg=7");                                    
                        }
                        break;    
                }
                $view = 'tarif';                      
                break;
            /* CRUD invalide */ 
            default:
                $view = '404';
                break;
        }
    } else {
        $listeTarification = getListeTarification();
        $htmlTarif = '';
        
        function definitionBoutonCrud($prixLocation,$codeDuree,$colonne) {
            $crud = '';
            if($prixLocation == null) {
                $crud = '
                <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="fas fa-plus"></i></a>';
            } else {
                $crud = '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=r&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="far fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$codeDuree.'&cp='.$colonne.'" role="button"><i class="fas fa-times"></i></a></';
            } 
            return $crud;           
        }
        foreach ($listeTarification as $tarification) {

            $crudPS = definitionBoutonCrud($tarification['prixLocationPS'],$tarification["codeDuree"],'PS');
            $crudBB = definitionBoutonCrud($tarification['prixLocationBB'],$tarification["codeDuree"],'BB');
            $crudCO = definitionBoutonCrud($tarification['prixLocationCO'],$tarification["codeDuree"],'CO');

            $htmlTarif.= 
            '<tr>
                <td>'.$tarification["libDuree"].'</td>
                <td>'.$tarification["prixLocationPS"].'</td>
                <td>'.$crudPS.'</td>
                <td>'.$tarification["prixLocationBB"].'</td>
                <td>'.$crudBB.'</td>
                <td>'.$tarification["prixLocationCO"].'</td>
                <td>'.$crudCO.'</td>
            </tr>';
            
        }  
        $view = 'tarif';        
    }
}
?>