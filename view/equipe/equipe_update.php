<div class="container  mt-3">
    <div class='bloc ' id='coursdesurf'>
        <div class="text-center">
            <img src="model/data/<?php echo $equipier['codeEq']?>.jpg" alt="<?php echo $equipier['surnomEq']?>" class="rounded-circle img-fluid qdp">
        </div>
        <form action="index.php?action=E&crud=u&ce=<?php  echo $equipier['codeEq']  ?>" enctype='multipart/form-data' method="post">
            <div class="form-group">
                <label for="codeEquipier">Code Equipier</label>
                <input type="text" class="form-control" id="codeEq" value='<?php  echo $equipier['codeEq']  ?>' readonly>
            </div>
            <div class="form-group">
                <label for="surnom">Surnom</label>
                <input type="text" class="form-control" value='<?php  echo $equipier['surnomEq'] ?>' name='surnom' required>
            </div>
            <div class="form-group">
                <label for="nom">Nom Prénom</label>
                <input type="text" class="form-control" value='<?php  echo $equipier['nomEq']  ?>' name='nom' required>
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input type="text" class="form-control" value='<?php  echo $equipier['fonctionEq']  ?>' name='fonction' required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name='image'>
            </div>
            <button type="submit" name= 'submitUpdateEquipier' class="btn btn-pr imary">Modifier equipier</button>
        </form>
    </div>
</div>