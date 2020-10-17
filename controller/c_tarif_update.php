<?php

include "model/m_tarif.php";

if (isset($_GET['cd']) && isset($_GET['cp'])) {
    $resultat = verifTarif();
    if ($resultat) {
        $_POST['msg'] = 1;
    } else {
        $_POST['msg'] = 2;
    }
};

?>