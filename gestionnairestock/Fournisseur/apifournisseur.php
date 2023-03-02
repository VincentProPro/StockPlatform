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
    case "achatcoursier":
        // echo "i is cake";
        // validerachatcoursier();
        break;
}

function ajouter(){
    $nom=$_POST['nommdf'];
    $tel=$_POST['telmdf'];
    $location=$_POST['locationmdf'];
    $email=$_POST['emailmdf'];
    $plusinfo=$_POST['plusinfomdf'];

        
              $objectCreated=new Gestionnairestock();
          // echo"execute executebondecommande";
          $objectCreated->createfournisseur($nom,$email,$tel,$plusinfo,$location);


}
function modifier(){
        // $fournicode=$_POST['fournisseur'];
        $matricule=$_POST['matricule'];
        $nom=$_POST['nommdf'];
        $tel=$_POST['telmdf'];
        $location=$_POST['locationmdf'];
        $email=$_POST['emailmdf'];
        $plusinfo=$_POST['plusinfomdf'];
        $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";
        $objectCreated->editfournisseur($matricule,$nom,$email,$tel,$plusinfo,$location);
    
    
}

function delete(){
	$matricule=$_POST['matricule'];
        
       
  $objectCreated=new Gestionnairestock();
  // echo"execute executebondecommande";
  $objectCreated->deletefournisseur($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>