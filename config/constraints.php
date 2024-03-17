<?php
    ob_start();
    //start session
    session_start();
    //create constraints to store non repeating values
    //define('SITEURL','hhttp://localhost:3000/admin/');
    define('SITEURL','http://localhost/cake-order/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','cake');




    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  //database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());  // selecting database


?>