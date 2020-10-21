<?php
    if (isset($_POST['msg'])) {
        switch (true) {
            case $_POST['msg'] == 1:
                $msg = "Modification effectué";
                $typeMsg = 'success';
                break;
            case $_POST['msg'] == 2:
                $msg = "Prix invalide";
                $typeMsg = 'danger';
                break;
        }
        echo '<div class="alert alert-'.$typeMsg.' alert-dismissible fade show m-1" role="alert">
                '.$msg.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
?>
<div class="container d-flex justify-content-center mt-3">
    <div class='bloc boutique'>
        <form action="index.php?action=T&crud=u&cd=<?php echo $resultat['codeDuree'] ?>&cp=<?php echo $resultat['categoProd'] ?>" method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Durée </label>
                <input class='form-control'type="text" disabled name='cd' value='<?php echo $resultat['codeDuree'] ?>'>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Categorie Produit</label>
                <input class='form-control'type="text" disabled name='cp' value="<?php echo $resultat['libDuree'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Prix</label>
                <input class='form-control'type="number" name='prix' value='<?php  echo $resultat['prixLocation']  ?>' required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Modifier tarif</button>
        </form>
    </div>
</div>