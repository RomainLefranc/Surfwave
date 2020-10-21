<?php
    if (isset($_POST['msg'])) {
        switch (true) {
            case $_POST['msg'] == 1:
                $msg = "Prix invalide";
                $typeMsg = 'danger';
                break;
        }
        echo '
        <div class="alert alert-'.$typeMsg.' alert-dismissible fade show m-1" role="alert">
            '.$msg.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
    }
?>
<div class="container d-flex justify-content-center mt-3">
    <div class='bloc boutique'>
        <form action="index.php?action=T&crud=c&cd=<?php echo $codeDureeInput ?>&cp=<?php echo $categoProdInput ?>" method="POST">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Durée </label>
                <input class='form-control'type="text" readonly name='cd' value='<?php echo $codeDureeInput ?>'>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Categorie Produit</label>
                <input class='form-control'type="text" readonly name='cp' value="<?php echo $categoProdInput ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Prix</label>
                <input class='form-control'type="number" name='prix' required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Ajouter tarif</button>
        </form>    
    </div>
</div>


