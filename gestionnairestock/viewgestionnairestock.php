<?php
// echo"good";
require("../Model/gestionnairestock.php");
$gestionnairestock=new Gestionnairestock();
// $boncommandenonvalid=$gestionnairestock->viewAllCommandenonValider();
// $boncommandNonExecuter=$gestionnairestock->viewAllNonExecuter();
// $boncommandExecuter=$gestionnairestock->viewAllExecuter();
// $boncommandevalid=$gestionnairestock->viewAllCommandeValider();
// print_r($boncommandenonvalid);
$achatentrernonvalid=$gestionnairestock->viewAllAchatEntrernonValider();
$sortimagasinNonExecuter=$gestionnairestock->viewAllSortiNonExecuter();
$sortimagasinExecuter=$gestionnairestock->viewAllSortiExecuter();
$achatentrervalid=$gestionnairestock->viewAllAchatEntrerValider();
$achatCoursierValider=$gestionnairestock->viewAllAchatCoursierValider();
$achatCoursiernonValider=$gestionnairestock->viewAllAchatCoursiernonValider();
$retraitdetailnonvalid=$gestionnairestock->viewAllRetraitDetailnonValider();
$retraitdetailvalid=$gestionnairestock->viewAllRetraitDetailValider();
$stockmagasin=$gestionnairestock->viewAllStockMagasin();

?>