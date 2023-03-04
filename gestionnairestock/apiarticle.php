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
          $objectCreated->createarticle($designation,$prixachat,$prixvente,$category,$quantity_per_unit,$description,$poids_kg,$format,($prixvente-$prixachat),$tmc);


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
  $groupcode=$_POST['groupcode'];
        $objectCreated=new Gestionnairestock();
        echo"In apiarticle >> matricule ".$matricule." groupcode: ".$groupcode." designation: ".$designation." prixachat :".$prixachat." prixvente: ".$prixvente." category : ".$category." quantity_per_unit : ".$quantity_per_unit." description : ".$description." poids_kg: ".$poids_kg." format : ".$format." benefice: ".($prixvente-$prixachat)." tmc : ".$tmc;
        $objectCreated->editarticle($matricule,$groupcode,$designation,$prixachat,$prixvente,$category,$quantity_per_unit,$description,$poids_kg,$format,($prixvente-$prixachat),$tmc);
    
    
}

function delete(){
	$matricule=$_POST['matricule'];
        
       
  $objectCreated=new Gestionnairestock();
  // echo"execute executebondecommande";
  $objectCreated->deletearticle($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>