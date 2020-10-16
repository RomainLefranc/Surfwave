<?php
    if (isset($_POST["erreur"] )) {
        if (
            htmlspecialchars($_POST["erreur"]) == 1) {
            echo '
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Mot de passe ou identifiant invalide
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>               
            </div>
          ';
        }
    }
?>
<section id='section-connexion'>
    <div class="container">
        <div class="bloc boutique">
            <?php
            if (isset($_SESSION["user"])) {
                $user = $_SESSION["user"];
                echo '
                <h2>Bienvenue '.$user.'</h2>
                <hr>
                <a class="btn btn-primary d-block m-1" href="index.php?action=D" role="button">Se deconnecter</a>
                <a class="btn btn-primary d-block m-1" href="index.php?action=ad" role="button">Administration</a>';
            } else { 
                echo '
                <div class="d-flex justify-content-center">
                    <form action="index.php?action=A" method="POST" class=" p-4 rounded col-6">
                        <div class="form-group">
                            <h2>Connexion</h2>
                            <label for="id">Adresse mail</label>
                            <input type="text" class="form-control" id="id" name="login" aria-describedby="emailHelp" placeholder="Saisir adresse mail" required>
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe"  required>
                        </div>
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </form>
                </div>';
            }
            ?>
        </div>
    </div>  
</section>
