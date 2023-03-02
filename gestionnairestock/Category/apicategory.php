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
  // $codeis=$_POST['codeis'];
  $nom=$_POST['nommdf'];
  $description=$_POST['descriptionmdf'];

        
              $objectCreated=new Gestionnairestock();
          // echo"execute executebondecommande";
          $objectCreated->createcategory($nom,$description);


}
function modifier(){
        // $fournicode=$_POST['fournisseur'];
        $matricule=$_POST['matricule'];
        // $codeis=$_POST['codeis'];
        $nom=$_POST['nommdf'];
        
        $description=$_POST['descriptionmdf'];
        $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";
        $objectCreated->editcategory($matricule,$nom,$description);
    
    
}

function delete(){
	$matricule=$_POST['matricule'];
        
       
  $objectCreated=new Gestionnairestock();
  // echo"execute executebondecommande";
  $objectCreated->deletecategory($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>