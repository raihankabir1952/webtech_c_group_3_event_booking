<?php

    session_start();
    // session_destroy();
    unset($_SESSION['status']);
     header('location:../landing_page/landing_page.php');

?>