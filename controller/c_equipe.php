<?php
include "model/m_equipe.php";

if (isset($_SESSION['user'])) {
    if (isset($_GET['crud'])) {
        switch (true) {
            case $_GET['crud'] == 'c' || $_GET['crud'] == 'r' || $_GET['crud'] == 'u' ||$_GET['crud'] == 'd':
                
                $codeEq = htmlspecialchars($_GET['eq']);
    
                switch (true) {
                    case $_GET['crud'] == 'c':
                        if (!verifCodeEqExiste($codeEq)) {
                            if (isset($_POST['surnom']) && isset($_POST['nom']) && isset($_POST['fonction']) && isset($_FILES['image'])) {
                                
                                $dossierImage = 'model/data/';
                                
                                $fichier = basename($_FILES['image']['name']);
                                $surnom = htmlspecialchars($_POST['surnom']);
                                $nom = htmlspecialchars($_POST['nom']);
                                $fonction = htmlspecialchars($_POST['fonction']);

                                $ext = explode(".", $_FILES["image"]["name"]);
                                $ext = end($ext);
                                $nomfichier = $codeEq.'.'.$ext;
                                var_dump($_FILES['image']);

                                $chemin = "model/data/". $nomfichier;

                                if(move_uploaded_file( $_FILES['image']['tmp_name'], $chemin)) {
                                    echo 'oui';
                                } else {
                                    echo 'non';
                                }

                                AjoutEquipier($codeEq,$surnom,$nom,$fonction);
/*                                 header("location: index.php?action=E&msg=4");   
 */                            }  else {
                                /* $_POST['msg'] = 2; */
                            }
                        } else {
                            header("location: index.php?action=E&msg=1");   
                        }
                        break;
                    case $_GET['crud'] == 'r' ||  $_GET['crud'] == 'u' || $_GET['crud'] == 'd':
                        if (verifCodeEqExiste($codeEq)) {
                            switch (true) {
                                case $_GET['crud'] == 'r':
                                    $resultat = getEquipier($codeEq);                                    
                                    break;
                                case $_GET['crud'] == 'u':
                                    if (isset($_POST['surnom']) && isset($_POST['nom']) && isset($_POST['fonction']) && isset($_FILES['image'])) {
                                        
                                    }
                                    $resultat = getEquipier($codeEq);                                    
                                    break;
                                case $_GET['crud'] == 'd':
                                    deleteEquipier($codeEq);
                                    header("location: index.php?action=E&msg=3"); 
                                    break;
                            }
                        } else {
                            header("location: index.php?action=E&msg=2");   
                        }
                        break;
                }
                $view = 'equipe';
                break;
            default:
                $view = '404';
                break;
        }
    } else {
        if (isset($_POST['codeEquipier'])) {
            $codeEquipier = htmlspecialchars($_POST['codeEquipier']);
            echo verifCodeEqExiste($codeEquipier);
            if (!verifCodeEqExiste($codeEquipier)) {
                header("location: index.php?action=E&crud=c&eq=$codeEquipier");   
            } else {
                $_POST['msg'] = 1;
            }
        }
        $listeEquipier = getListeEquipier();
        $htmlEquipier = '';
        foreach ($listeEquipier as $equipier) {

            $crud = '<a class="btn btn-primary btn-sm align-middle" href="index.php?action=E&crud=u&eq='.$equipier["codeEq"].'" role="button"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-primary btn-sm align-middle" href="index.php?action=E&crud=r&eq='.$equipier["codeEq"].'" role="button"><i class="far fa-eye"></i></a>
                    <a class="btn btn-danger btn-sm align-middle" href="index.php?action=E&crud=d&eq='.$equipier["codeEq"].'" role="button"><i class="fas fa-times"></i></a>'; 
            $htmlEquipier.= '
            <tr>
                <td class="align-middle">'.$equipier["codeEq"].'</td>
                <td class="align-middle">'.$equipier["surnomEq"].'</td>
                <td class="align-middle">'.$equipier["nomEq"].'</td>
                <td class="align-middle">'.$equipier["fonctionEq"].'</td>
                <td class="align-middle">'.$crud.'</td>
            </tr>
            ';
        }
        $view = 'equipe';
    }
} else{
    $view = '403';
}

?>