<?php 
    include('../config/constraints.php');
    include('login-check.php');
    
?>



<html>
    <head>
        <title> Sweets Order Website </title>

        <link rel="stylesheet" href="admin.css">
    </head>

    <body> 

       <!-- menu section start-->
       <div class="menu">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home </a></li>
                    <li><a href="manage-admin.php">Admin </a></li>
                    <li><a href="manage-category.php">Category </a></li>
                    <li><a href="manage-sweets.php">Sweets </a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>       
       </div>
       <!-- menu section end-->