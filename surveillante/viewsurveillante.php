<?php
// echo"good";
require("../Model/surveillante.php");
$surveillante=new Surveillante();
$boncommandenonvalid=$surveillante->viewAllCommandenonValider();
$boncommandNonExecuter=$surveillante->viewAllNonExecuter();
$boncommandExecuter=$surveillante->viewAllExecuter();
$boncommandevalid=$surveillante->viewAllCommandeValider();


$achatentrernonvalid=$surveillante->viewAllAchatEntrernonValider();
$sortimagasinNonExecuter=$surveillante->viewAllSortiNonExecuter();
$sortimagasinExecuter=$surveillante->viewAllSortiExecuter();
$achatentrervalid=$surveillante->viewAllAchatEntrerValider();
$retraitdetailnonvalid=$surveillante->viewAllRetraitDetailnonValider();
$retraitdetailvalid=$surveillante->viewAllRetraitDetailValider();

$achatCoursierValider=$surveillante->viewAllAchatCoursierValider();
$achatCoursiernonValider=$surveillante->viewAllAchatCoursiernonValider();
// $stockcmu=$surveillante->viewAllCmuStock();
$stockmagasin=$surveillante->viewAllMagasinStock();

// print_r($boncommandenonvalid);

?>