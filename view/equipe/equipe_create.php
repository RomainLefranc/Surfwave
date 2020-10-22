
<div class="container mt-3">
    <?php
        if (isset($_POST['msg'])) {
            $post = htmlspecialchars($_POST['msg']);
            switch (true) {
                case $post == 2:
                    $msg = "Saisie invalide";
                    $typeMsg = 'danger';                     
                    break;
            }
            echo '
            <div class="alert alert-'.$typeMsg.' alert-dismissible fade show" role="alert">'.$msg.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ';
        }
    ?>
    <div class='bloc boutique'>
        <form enctype="multipart/form-data" action="index.php?action=E&crud=c&eq=<?php echo $codeEq ?>" method="POST">
            <div class="form-group">
                <label for="surnom">Surnom </label>
                <input class='form-control'type="text" name='surnom'>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input class='form-control'type="text" name='nom'>
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input class='form-control' type="text" name='fonction' required>
            </div>
            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                <input type="file" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Créer equipier</button>
        </form>    
    </div>
</div>