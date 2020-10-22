



<div class="container mt-3">
    <?php
        if (isset($_POST['msg'])) {
            $post = htmlspecialchars($_POST['msg']);
            switch (true) {
                case $post == 1:
                    $msg = "Ce code equipier est invalide";
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
    <form action="index.php?action=E" method="post">
        <div class="form-group">
            <label for="CodeEq">Code Equipier</label>
            <input class='form-control' type="text" name='codeEquipier' required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Créer equipier</button>
    </form>
    <div class='bloc boutique'>
        <h2>Equipe</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Surnom</th>
                    <th>Nom</th>
                    <th>Fonction</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo $htmlEquipier;
                ?>
            </tbody>
        </table>
    </div>
</div>