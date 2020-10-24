<?php



/* Dictionnaire de données

CREATE
1 = Prix invalide

UPDATE
1 = Modification effectué
2 = Prix invalide

READ +
1 = Duree invalide
2 = Categorie de produit invalide
3 = Suppression effectué
4
5 = Tarif déja existant
6 = Ajout effectué
7 = Tarif inexistant

*/
include "model/m_tarif.php";

if (isset($_SESSION['user'])) {
    if (isset($_GET['crud'])) {
        $getCrud = htmlspecialchars($_GET['crud']);
        switch (true) {
            /* CRUD valide */
            case $getCrud == 'c' || $getCrud == 'r' || $getCrud == 'u' || $getCrud == 'd':

                $codeDureeInput = htmlspecialchars($_GET['cd']);
                $categoProdInput = htmlspecialchars($_GET['cp']);
                
                if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput)) {
                    switch (true) {
                        case $getCrud == 'c':
                            if (!verifTarifExiste($codeDureeInput, $categoProdInput)) {
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
                        case $getCrud == 'r' ||  $getCrud == 'u' || $getCrud == 'd':
                            if (verifTarifExiste($codeDureeInput, $categoProdInput)) {
                                switch (true) {
                                    case $getCrud == 'r':
                                        $resultat = getTarif($codeDureeInput,$categoProdInput);
                                        break;
                                    case $getCrud == 'u':
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
                                    case $getCrud == 'd':
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
                }     
                break;
            /* CRUD invalide */ 
            default:
                $view = '404';
                break;
        }
    } else {       /* Read + */
        $listeTarification = getListeTarification();
        $htmlTarif = '';
        
        foreach ($listeTarification as $tarification) {

            $crudPS = definitionBoutonCrud($tarification['prixLocationPS'],$tarification["codeDuree"],'PS');
            $crudBB = definitionBoutonCrud($tarification['prixLocationBB'],$tarification["codeDuree"],'BB');
            $crudCO = definitionBoutonCrud($tarification['prixLocationCO'],$tarification["codeDuree"],'CO');

            $tarification["prixLocationPS"] = testVide($tarification["prixLocationPS"]);
            $tarification["prixLocationBB"] = testVide($tarification["prixLocationBB"]);
            $tarification["prixLocationCO"] = testVide($tarification["prixLocationCO"]);
            
            $htmlTarif.= '
            <tr>
                <td class="align-middle">'.$tarification["libDuree"].'</td>
                <td class="align-middle">'.$tarification["prixLocationPS"].'</td>
                <td class="align-middle">'.$crudPS.'</td>
                <td class="align-middle">'.$tarification["prixLocationBB"].'</td>
                <td class="align-middle">'.$crudBB.'</td>
                <td class="align-middle">'.$tarification["prixLocationCO"].'</td>
                <td class="align-middle">'.$crudCO.'</td>
            </tr>
            ';
            
        }  
        $view = 'tarif';        
    }
} else {
    $view = '403';
}
?>
