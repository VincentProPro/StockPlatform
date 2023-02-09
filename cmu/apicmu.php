<?php
ob_start();

$formulaire=$_POST['formulaire'];

require("../Model/gerantcmu.php");

switch ($formulaire) {
    case "retraitartcl":
        ajoutretrait();
        break;
    // case "executer":
    //     executerbondecommande();
    //     break;
    // case "valider":
    //     validerbondecommande();
    //     break;
}

function ajoutretrait(){
	$nameartcl=$_POST['autocomplete-search'];
        $numerofacture=$_POST['caissematricule'];

        $quantity=$_POST['quantity'];
        $situation_matricule=$_POST['situation'];
       
			$objectCreated=new GerantCMU();
		// echo"execute executebondecommande";
		 $objectCreated->executeretrait($nameartcl,$quantity,$situation_matricule,$numerofacture);


}

    ob_end_flush(); // Flush the output from the buffer

?>