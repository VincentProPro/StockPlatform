<?php
// echo"good";
require("../Model/coursier.php");
$coursier=new Coursier();
$boncommandExecuter=$coursier->viewAllExecuter();
$boncommandevalid=$coursier->viewAllCommandeValider();
// print_r($boncommandevalid);

?>