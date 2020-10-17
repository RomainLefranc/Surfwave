<?php
if (isset($_POST['msg'])) {
    if ($_POST['msg'] == 1) {
        echo '<div class="alert alert-success" role="alert">
        Ajout effectué
      </div>';
    }
}
?>
<div class="container d-flex justify-content-center">
    <form action="index.php?action=T&crud=u&cd=<?php echo $resultat['codeDuree'] ?>&cp=<?php echo $resultat['categoProd'] ?>" method="POST"class='col-6'>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Durée </label>
            <input class='form-control'type="text" disabled name='cd' value='<?php echo $resultat['codeDuree'] ?>'>

        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Categorie Produit</label>
            <input class='form-control'type="text" disabled name='cp' value="<?php echo $resultat['categoProd'] ?>">

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Prix</label>
            <input class='form-control'type="number" name='prix' value='<?php  echo $resultat['prixLocation']  ?>' required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Modifier tarif</button>
    </form>
</div>