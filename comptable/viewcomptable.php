<?php
// echo"good";
require("../Model/comptable.php");
$comptable=new Comptable();
$boncommandenonvalid=$comptable->viewAllCommandenonValider();
$boncommandNonExecuter=$comptable->viewAllNonExecuter();
$boncommandExecuter=$comptable->viewAllExecuter();
$boncommandevalid=$comptable->viewAllCommandeValider();
// print_r($boncommandenonvalid);

?>