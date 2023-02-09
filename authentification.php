<?php

        session_start();
        // $_SESSION["matricule"] = ;  

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/StockPlateforme/logout.php");
    exit;
}else{

    // echo"good authen";
}