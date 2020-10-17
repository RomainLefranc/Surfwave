<?php
function verifAction() {
    if (isset($_GET["action"])) {
       return true;
    } else {
        header("location: index.php?action=A");
    }
};
function verifSession() {
    if (isset($_SESSION["user"])) {
        return true;
    } else {
        $view = "403";
    }
}
function verifCrud() {
    if (isset($_GET["crud"])) {
        return true;
    } else if($_GET["action"] == "T"){
        header("location: index.php?action=T&crud=r");
    } else {
        header("location: index.php?action=E&crud=r");
    }
}

?>