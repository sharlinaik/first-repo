<?php
    //include constraints.php for SITEURL
    include('../config/constraints.php');
    //1.destroy the session 
    session_destroy(); //unset $_SESSION['user']

    //2.redirect to login page
    header('location:'.SITEURL.'admin/login.php');

?>