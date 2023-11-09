<?php
include "config.php";
session_start();
unset($_SESSION['adminUserName']);
unset($_SESSION['adminSuccessFullyLoggedIn']);
session_destroy();
header("Location: ".$_POST['referralUrl']);
exit();
