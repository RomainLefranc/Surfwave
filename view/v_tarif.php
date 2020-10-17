<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
/*         include "tarif/tarif_header.php"; */
        if ($_GET['crud'] == 'c') {
            include "tarif/tarif_create.php";
        } elseif ($_GET['crud'] == 'r') {
            include "tarif/tarif_read.php";
        } elseif ($_GET['crud'] == 'u') {
            include "tarif/tarif_update.php";
        } elseif ($_GET['crud'] == 'd') {
            include "tarif/tarif_delete.php";
        }
    ?>
    <script src="assets/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>