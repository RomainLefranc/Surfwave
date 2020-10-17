<?php
if (isset($_POST['msg'])) {
    if ($_POST['msg'] == 1) {
        echo '<div class="alert alert-success" role="alert">
        Ajout effectué
      </div>';
    }else {
        echo '<div class="alert alert-danger" role="alert">
        Ce tarif existe déjà
      </div>';
    }
}
?>
<div class="container d-flex justify-content-center">
    <form action="index.php?action=T&crud=c" method="POST"class='col-6'>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Durée </label>
            <select class="form-control" id="exampleFormControlSelect1" name='duree' required>
                <?php
                    echo $selectDuree;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Categorie Produit</label>
            <select class="form-control" id="exampleFormControlSelect2" name='categoProd' required>
            <?php
                    echo $selectCatego;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Prix</label>
            <input class='form-control'type="number" name='prix' required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Ajouter tarif</button>
    </form>
</div>


