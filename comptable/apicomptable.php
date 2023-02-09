<?php

$formulaire=$_POST['formulaire'];

require("../Model/comptable.php");

switch ($formulaire) {
    case "bondecommande":
        ajoutbondecommande();
        break;
    case "executer":
        executerbondecommande();
        break;
    case "valider":
        validerbondecommande();
        break;
}

function ajoutbondecommande(){
	$magasin=$_POST['magasin'];
        $description=$_POST['description'];

        $libeller=$_POST['libeller'];
        $situation=$_POST['situation'];
        $tarif=$_POST['tarif'];
       
			$objectCreated=new Comptable();
		// echo"execute executebondecommande";
		 $objectCreated->generatebesoin($libeller,$description,$tarif,$magasin,$situation);


}

function executerbondecommande(){
	$matriculebond=$_POST['matricule'];
        
       
			$objectCreated=new Comptable();
		// echo"execute executebondecommande";
		 $objectCreated->executebesoin($matriculebond);


}
function validerbondecommande(){
    $matriculebond=$_POST['matricule'];
        
       
            $objectCreated=new Comptable();
        // echo"execute executebondecommande";
         $objectCreated->executevalidationCommande($matriculebond,1);


}
?>