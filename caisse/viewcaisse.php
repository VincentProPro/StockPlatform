<?php
ob_start();

// echo"good";
require("../Model/caisse.php");
$caisse=new Caisse();

$boncommandevalid=$caisse->viewAllCommandeValider();
$boncommandExecuter=$caisse->viewAllExecuter();
$stockcmu=$caisse->viewAllCmuStock();


// print_r($boncommandenonvalid);
 ob_end_flush();

?>