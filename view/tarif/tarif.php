<div class="container mt-3">
    <div class='bloc' id='coursdesurf'>
        <?php
            if (isset($_GET['msg'])) {
                switch (true) {
                    case $_GET['msg'] == 1:
                        $msg = "Durée invalide";
                        $typeMsg = 'danger';
                        break;
                    case $_GET['msg'] == 2:
                        $msg = "Categorie de produit invalide";
                        $typeMsg = 'danger';
                        break;
                    case $_GET['msg'] == 3:
                        $msg = "Suppression effectué";
                        $typeMsg = 'success';
                        break;
                    case $_GET['msg'] == 5:
                        $msg = "Ce tarif existe déjà impossible";
                        $typeMsg = 'danger';
                        break;
                    case $_GET['msg'] == 6:
                        $msg = "Ajout effectué";
                        $typeMsg = 'success';
                        break;
                    case $_GET['msg'] == 7:
                        $msg = "Ce tarif n'existe pas";
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
        <div class="table-responsive">
            <table class='table table-hover text-center'>
                <thead class='thead-dark'>
                    <th class="rounded-left border-0 align-middle">Libellé Durée</th>
                    <th class="border-0 align-middle">Planche de surf</th>
                    <th class="border-0 align-middle"></th>
                    <th class="border-0 align-middle">Bodyboard</th>
                    <th class="border-0 align-middle"></th>
                    <th class="border-0 align-middle">Combinaison</th>
                    <th class="rounded-right border-0 align-middle"></th>
                </thead>
                <tbody>
                    <?php
                        echo $htmlTarif
                    ?>
                </tbody>
            </table>        
        </div>

    </div>
</div>