<?php
include "model/m_equipe.php";

if (isset($_SESSION['user'])) {

    if (isset($_GET['crud'])) {
        $crud = htmlspecialchars($_GET['crud']);
        switch (true) {
            case $crud == 'c' || $crud == 'r' || $crud == 'u' || $crud == 'd':
                $codeEq = htmlspecialchars($_GET['ce']);
                switch (true) {
                    case $crud == 'c';
                        if (!verifCodeEqExiste($codeEq)) {
                            if (isset($_POST['submitCreationEquipe'])) {

                                $target_dir = "model/data/";
                                $temp = explode(".", $_FILES["image"]["name"]);
                                $newfilename = $codeEq . '.' . end($temp);
                                $target_file = "model/data/" . $newfilename;
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                $surnom = htmlspecialchars($_POST['surnom']);
                                $nom = htmlspecialchars($_POST['nom']);
                                $fonction = htmlspecialchars($_POST['fonction']);
                                if(verifImage($target_file)) {
                                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                                    createEquipier($codeEq,$surnom,$nom,$fonction);
                                    /* Ajout effectué */
                                    header("location: index.php?action=E&msg=6");  
                                } else {

                                    $_POST['msg'] = 1;
                                }
 
                            }
                        } else {
                            /* Msg = Equipier déjà existant */
                            header("location: index.php?action=E&msg=5");   
                        }                      
                        break;
                    case $crud == 'r' || $crud == 'u' || $crud == 'd':
                        if (verifCodeEqExiste($codeEq)) {
                            switch (true) {
                                case $crud == 'r':
                                    $donnee = getInfoEquipier($codeEq);
                                    break;
                                case $crud == 'u':
                                    if (isset($_POST['submitUpdateEquipier'])) {
                                        # code...
                                    }
                                    $donnee = getInfoEquipier($codeEq);
                                    break;
                                case $crud == 'd':
                                    deleteEquipier($codeEq);
                                    /* Msg = Suppression effectué */
                                    header("location: index.php?action=E&msg=3");                                     
                                    # code...
                                    break;
                            }
                        } else {
                            /* Msg = Equipier inexistant */
                            header("location: index.php?action=E&msg=7");   
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
        $listeEquipier = getListeEquipier();
        $html = '';

        foreach ($listeEquipier as $equipier) {


            $crud = '
            <div class="btn-group" role="group">
                <a class="btn btn-primary btn-sm align-middle" href="index.php?action=E&crud=u&ce='.$equipier["codeEq"].'" role="button"><i class="fas fa-edit"></i></a>
                <a class="btn btn-primary btn-sm align-middle" href="index.php?action=E&crud=r&ce='.$equipier["codeEq"].' role="button"><i class="far fa-eye"></i></a>
                <a class="btn btn-danger btn-sm align-middle" href="index.php?action=E&crud=d&ce='.$equipier["codeEq"].'" role="button"><i class="fas fa-times"></i></a>
            </div>
            ';
            $html.= '
            <tr>
                <td class="align-middle">'.$equipier["codeEq"].'</td>
                <td class="align-middle">'.$equipier["surnomEq"].'</td>
                <td class="align-middle">'.$equipier["nomEq"].'</td>
                <td class="align-middle">'.$equipier["fonctionEq"].'</td>
                <td class="align-middle">'.$crud.'</td>

            </tr>
            ';
        }
        if (isset($_POST['submitCreationEquipier'])) {
            $codeEq = htmlspecialchars($_POST['codeEq']);
            if (!verifCodeEqExiste($codeEq)) {
                header("location: index.php?action=E&crud=c&ce=$codeEq");   
            } else {
                $_POST['msg'] = 1;
            }
        }
        $view = 'equipe';
    }
} else {
    $view = '403';
}
?>

