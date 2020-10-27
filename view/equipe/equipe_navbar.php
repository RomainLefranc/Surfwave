<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href=""><img src="media/logo.png" alt="logo">Gestion Equipe</a>
        <?php
            if (isset($_GET['crud'])) {
                echo'<a class="btn btn-primary" href="index.php?action=E" role="button">Retour</a>';
            } else {
                echo '<a class="btn btn-primary" href="index.php?action=AD" role="button">Retour</a>';
            }            
        ?>
    </div>
</nav>