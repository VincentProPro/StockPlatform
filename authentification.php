<?php
        session_start();
        // $_SESSION["matricule"] = ;  

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/StockPlatform/logout.php");
    exit;
}else{
    //generate token
    include_once "mytokens.php";
    $objecttoken= new Mytokens();
    if($objecttoken->authenticateRequest()===true){

    }else{
        header("location: http://localhost/StockPlatform/logout.php");
        exit;

    }

    // echo"good authen";
}