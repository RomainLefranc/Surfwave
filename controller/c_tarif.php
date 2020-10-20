<?php
include "model/m_tarif.php";

/*
Dictionnaire de message d'erreur

POST CREATE

1 : Prix invalide

POST UPDATE
1 : Modification effectué
2 : Vous essayez de modifier un tarif qui n'existe pas
3 : Prix invalide

GET
1 : durée invalide
2 : categorie de produit invalide
3 : Suppression effectué
4 : Modification impossible
5 : Ce tarif existe déjà
6 : Ajout effectué
*/

if (verifSession()) {

/*     switch (true) {
        case $_GET['crud'] == 'c':

            $codeDureeInput = htmlspecialchars($_GET['cd']);
            $categoProdInput = htmlspecialchars($_GET['cp']);

            if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && !verifTarifExiste($codeDureeInput, $categoProdInput)) {
                if (isset($_POST['prix'])) {
                    $prixOutput = htmlspecialchars($_POST['prix']);
                    if (verifPrix($prixOutput)) {
                        ajoutTarif($codeDureeInput, $categoProdInput, $prixOutput);
                        $_POST['msg'] = 1;        
                    } else {
                        $_POST['msg'] = 3;        
                    }   
                }
            } else {
                header("location: index.php?action=T&crud=r&msg=5");   
            }           
            $view = "tarif";            
            break; 
        case $_GET['crud'] == 'r':
            $listeTarification = getListeTarification();
            $htmlTarif = '';
            foreach ($listeTarification as $tarification) {
        
                if($tarification["prixLocationPS"] == null) {
                    $tarification["prixLocationPS"] = '
                    <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="fas fa-plus"></i></a>';
                } else {
                    $tarification["prixLocationPS"] .= '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="fas fa-times"></i></a></';
                }
            
                if($tarification["prixLocationBB"] == null) {
                    $tarification["prixLocationBB"] = '
            
                    <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="fas fa-plus"></i></a>';
                } else {
                    $tarification["prixLocationBB"] .= '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="fas fa-times"></i></a></';
                }
                if($tarification["prixLocationCO"] == null) {
                    $tarification["prixLocationCO"] = '
                    <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="fas fa-plus"></i></a>';
                } else {
                    $tarification["prixLocationCO"] .= '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="fas fa-times"></i></a>
                    ';
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
            break;    
        case $_GET['crud'] == 'u':

            $codeDureeInput = htmlspecialchars($_GET['cd']);
            $categoProdInput = htmlspecialchars($_GET['cp']);
            
            if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && verifTarifExiste($codeDureeInput, $categoProdInput)) {
            
                if (isset($_POST['prix'])) {
            
                    $prixOutput = htmlspecialchars($_POST['prix']);
            
                    if (verifPrix($prixOutput)) {
                        updateTarif($codeDureeInput, $categoProdInput, $prixOutput);
                        $_POST['msg'] = 1;        
                    } else {
                        $_POST['msg'] = 2;                     
                    }
                    
                }
                $resultat = getTarif($codeDureeInput, $categoProdInput);
            } else {
                header("location: index.php?action=T&crud=r&msg=4");
            }         
            $view = "tarif";           
            break;   
        case $_GET['crud'] == 'd':

            $codeDureeInput = htmlspecialchars($_GET['cd']);
            $categoProdInput = htmlspecialchars($_GET['cp']);

            if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && verifTarifExiste($codeDureeInput, $categoProdInput)) {
                deleteTarif($codeDureeInput,$categoProdInput);
                header("location: index.php?action=T&crud=r&msg=3");
            }
            $view = "tarif";            
            break;
        default:
            $view = '404';
            break;
    } */
    if (isset($_GET['crud'])) {
        switch (true) {
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
                                    header("location: index.php?action=T&msg=6");        
                                } else {
                                    $_POST['msg'] = 1;        
                                }   
                            }
                        } else {
                            header("location: index.php?action=T&msg=5");   
                        }                           
                        break;
                        
                    case $_GET['crud'] == 'u' || $_GET['crud'] == 'd' ||  $_GET['crud'] == 'r':
                        if (verifcodeDureeValide($codeDureeInput) && verifCategoProdValide($categoProdInput) && verifTarifExiste($codeDureeInput, $categoProdInput)){
                            switch (true) {
                                case $_GET['crud'] == 'u':
                                    if (isset($_POST['prix'])) {
            
                                        $prixOutput = htmlspecialchars($_POST['prix']);
                                
                                        if (verifPrix($prixOutput)) {
                                            updateTarif($codeDureeInput, $categoProdInput, $prixOutput);
                                            $_POST['msg'] = 1;        
                                        } else {
                                            $_POST['msg'] = 2;                     
                                        }
                                        
                                    }
                                    $resultat = getTarif($codeDureeInput, $categoProdInput);                                    
                                    break;
                                case $_GET['crud'] == 'd':
                                    deleteTarif($codeDureeInput,$categoProdInput);
                                    header("location: index.php?action=T&msg=3");                                    
                                    break;
                                case $_GET['crud'] == 'r':
                                    $resultat = getTarif($codeDureeInput,$categoProdInput);                                   
                                    break;
                            }
                        }
                        break;    
                }
                $view = 'tarif';                      
                break; 
            default:
                $view = '404';
                break;
        }
    } else {
        $listeTarification = getListeTarification();
        $htmlTarif = '';
        foreach ($listeTarification as $tarification) {
            
            if($tarification["prixLocationPS"] == null) {
                $crudPS = '
                <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="fas fa-plus"></i></a>';
            } else {
                $crudPS = '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=r&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="far fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=PS" role="button"><i class="fas fa-times"></i></a></';
            }
        
            if($tarification["prixLocationBB"] == null) {
                $crudBB = '
        
                <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="fas fa-plus"></i></a>';
            } else {
                $crudBB = '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=r&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="far fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=BB" role="button"><i class="fas fa-times"></i></a></';
            }
    
            if($tarification["prixLocationCO"] == null) {
                $crudCO = '
                <a class="btn btn-primary align-middle btn-sm" href="index.php?action=T&crud=c&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="fas fa-plus"></i></a>';
            } else {
                $crudCO = '
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=u&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=T&crud=r&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="far fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=T&crud=d&cd='.$tarification["codeDuree"].'&cp=CO" role="button"><i class="fas fa-times"></i></a>';
            }
        
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