<div class="container d-flex justify-content-center mt-3">
    <div class='bloc boutique'>
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Durée </label>
                <input class='form-control'type="text" readonly name='cd' value='<?php echo $resultat['codeDuree'] ?>'>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Categorie Produit</label>
                <input class='form-control'type="text" readonly name='cp' value="<?php echo $resultat['categoProd'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Prix</label>
                <input class='form-control'type="number" name='prix' value='<?php  echo $resultat['prixLocation']  ?>' readonly>
            </div>
        </form>
    </div>
</div>