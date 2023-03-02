<?php
ob_start();
$formulaire=$_POST['formulaire'];

require("../../Model/gestionnairestock.php");
switch ($formulaire) {
    case "ajouter":
    // echo"entrerachat";
        ajouter();
        break;
    case "modifier":
        modifier();
        break;
    case "delete":
        delete();
        break;

}

function ajouter(){
  $designation=$_POST['designation'];
  $prixachat=$_POST['prixachat'];
  $prixvente=$_POST['prixvente'];
  $category=$_POST['category'];
  $quantity_per_unit=$_POST['quantity_per_unit'];
  $description=$_POST['description'];
  $poids_kg=$_POST['poids_kg'];
  $format=$_POST['format'];
  $tmc=$_POST['tmc'];

        
              $objectCreated=new Gestionnairestock();
          // echo"execute executebondecommande";
          $objectCreated->createarticle($nom,$description);


}
function modifier(){
  $matricule=$_POST['matricule'];
  $designation=$_POST['designation'];
  $prixachat=$_POST['prixachat'];
  $prixvente=$_POST['prixvente'];
  $category=$_POST['category'];
  $quantity_per_unit=$_POST['quantity_per_unit'];
  $description=$_POST['description'];
  $poids_kg=$_POST['poids_kg'];
  $format=$_POST['format'];
  $tmc=$_POST['tmc'];
        $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";
        $objectCreated->editarticle($matricule,$nom,$description);
    
    
}

function delete(){
	$matricule=$_POST['matricule'];
        
       
  $objectCreated=new Gestionnairestock();
  // echo"execute executebondecommande";
  $objectCreated->deletearticle($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>