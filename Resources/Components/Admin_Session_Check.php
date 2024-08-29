<?php 
    session_start();

    // Check if the administrator is logged in
    if (!isset($_SESSION['admin_email'])) {
        header("Location: Login.php");
        exit;
    }
?>