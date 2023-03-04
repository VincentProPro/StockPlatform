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
  $matricule_module=$_POST['matricule_module'];


        
              $objectCreated=new Gestionnairestock();
          // echo"execute executebondecommande";
          $objectCreated->createsituation($nom,$description,$matricule_module);


}
function modifier(){
        // $fournicode=$_POST['fournisseur'];
        $matricule=$_POST['matricule'];
        $code=$_POST['code'];
        $nom=$_POST['nom'];
        $matricule_module=$_POST['matricule_module'];

        $description=$_POST['description'];
        $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";
        $objectCreated->editsituation($matricule,$nom,$code,$description,$matricule_module);
    
    
}

function delete(){
	$matricule=$_POST['matricule'];
        
       
  $objectCreated=new Gestionnairestock();
  // echo"execute executebondecommande";
  $objectCreated->deletesituation($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>