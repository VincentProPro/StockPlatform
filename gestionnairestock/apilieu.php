<?php
ob_start();
$formulaire=$_POST['formulaire'];

require("../Model/gestionnairestock.php");
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
  $nom=$_POST['nom'];
  $description=$_POST['description'];

        
              $objectCreated=new Gestionnairestock();
          // echo"execute executebondecommande";
          $objectCreated->createlieu($nom,$description);


}
function modifier(){
        // $fournicode=$_POST['fournisseur'];
        $matricule=$_POST['matricule'];
        $code=$_POST['code'];
        $nom=$_POST['nom'];
        
        $description=$_POST['description'];
        $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";
        $objectCreated->editlieu($matricule,$nom,$description);
    
    
}

function delete(){
	$matricule=$_POST['matricule'];
        
       
  $objectCreated=new Gestionnairestock();
  // echo"execute executebondecommande";
  $objectCreated->deletelieu($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>