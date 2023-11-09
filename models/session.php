<?php
    include "config.php";
    session_start();

    // do any authentication first, then add POST variable to session
    $_SESSION['adminUserName'] = $_POST['adminUserName'];
    $_SESSION['adminSuccessFullyLoggedIn'] = $_POST['adminSuccessFullyLoggedIn'];    

    header("Location: ".$_POST['referralUrl']);
    exit();
?>