<?php
function verifAction() {
    if (isset($_GET["action"])) {
       return true;
    } else {
        header("location: index.php?action=A");
    }
};
function verifSessionAdmin() {
    if ($_SESSION['role'] == 1) {
        return true;
    } else {
        $view = "403";
    }
};
?>