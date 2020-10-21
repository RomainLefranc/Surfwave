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
                echo '<div class="alert alert-'.$typeMsg.' alert-dismissible fade show" role="alert">'.$msg.'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        ?>
        <table class='table table-hover'>
            <thead class='thead-dark'>
                <th class="rounded-left border-0 align-middle">Libellé Durée</th>
                <th colspan="2" class="border-0 align-middle">Planche de surf</th>
                <th colspan="2" class="border-0 align-middle">Bodyboard</th>
                <th colspan="2" class="rounded-right border-0 align-middle">Combinaison</th>
            </thead>
            <tbody>
                <?php
                    echo $htmlTarif
                ?>
            </tbody>
        </table>
    </div>
</div>