<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "Please login to access the admin panel.";
        header('location:'.SITEURL.'admin/login.php');
    }

?>