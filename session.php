<?php
session_start();


// if the user is already logged in then redirect user to welcome page
if (isset($_SESSION['userid']) && $_SESSION['userid'] === true) {
   
   
    $_SESSION['name'] = '';
    

    header("location: welcome.php");
    exit;
}


