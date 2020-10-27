<div class="container  mt-3">
    <div class='bloc ' id='coursdesurf'>
        <form>
            <div class="form-group">
                <label for="codeEquipier">Code Equipier</label>
                <input type="text" class="form-control" id="codeEq" value='<?php  echo $equipier['codeEq']  ?>' readonly>
            </div>
            <div class="form-group">
                <label for="surnom">Surnom</label>
                <input type="text" class="form-control"  value='<?php  echo $equipier['surnomEq']  ?>' readonly>
            </div>
            <div class="form-group">
                <label for="nom">Nom Prénom</label>
                <input type="text" class="form-control"  value='<?php  echo $equipier['nomEq']  ?>' readonly>
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input type="text" class="form-control" value='<?php  echo $equipier['fonctionEq']  ?>' readonly>
            </div>
        </form>
    </div>
</div>