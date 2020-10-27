<div class="container  mt-3">
    <div class='bloc ' id='coursdesurf'>
        <h2>Création equipier</h2>
        <form action="index.php?action=E" method="post" class>
            <div class="form-group">
                <label for="exampleFormControlInput1">Code Equipier</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name='codeEq' placeholder="code Equipier" required>
            </div>
            <button type="submit" name='submitCreationEquipier' class="btn btn-primary">Créer equipier</button>
        </form>
    </div>
</div>
<div class="container mt-3">
    <div class='bloc' id='coursdesurf'>
        <?php
            if (isset($_GET['msg'])) {
                switch (true) {
                    case $_GET['msg'] == 3:
                        $msg = "Suppression effectué";
                        $typeMsg = 'success';
                        break;
                    case $_GET['msg'] == 5:
                        $msg = "Equipier déjà existant";
                        $typeMsg = 'danger';
                        break;
                    case $_GET['msg'] == 6:
                        $msg = "Ajout effectué";
                        $typeMsg = 'success';
                        break;
                    case $_GET['msg'] == 7:
                        $msg = "Equipier inexistant";
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
            if (isset($_POST['msg'])) {
                $msg = htmlspecialchars($_POST['msg']);
                switch (true) {
                    case $msg == 1:
                        $msg = "Code equipier invalide ou déjà existant";
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
        <h2>Equipe</h2>
        <div class="table-responsive">
            <table class='table table-hover text-center'>
                <thead class='thead-dark'>
                    <th class="rounded-left border-0 align-middle">Code</th>
                    <th class="border-0 align-middle">Surnom</th>
                    <th class="border-0 align-middle">Nom</th>
                    <th class="border-0 align-middle">Fonction</th>
                    <th class="border-0 align-middle">Action</th>
                </thead>
                <tbody>
                    <?php
                        echo $html;
                    ?>
                </tbody>
            </table>        
        </div>
    </div>
</div>