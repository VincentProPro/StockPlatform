<?php
ob_start();

$formulaire=$_POST['formulaire'];

require("../Model/gerantcmu.php");

switch ($formulaire) {
    case "retraitartcl":
        ajoutretrait();
        break;
    case "addexpire":
        ajoutexpiringarticle();
        break;
    // case "valider":
    //     validerbondecommande();
    //     break;
}

function ajoutretrait(){
	$nameartcl=$_POST['autocomplete-search'];
        $numerofacture=$_POST['caissematricule'];

        $quantity=$_POST['quantity'];
        $situation_matricule=$_POST['situation'];
        $dateexpiring=$_POST['dateexpiring'];
       
			$objectCreated=new GerantCMU();
		echo"dateexpiring: ".$dateexpiring;
		 $objectCreated->executeretrait($nameartcl,$quantity,$situation_matricule,$numerofacture,$dateexpiring);


}
function ajoutexpiringarticle(){
	$nameartcl=$_POST['myArticle'];
    $matricule_format=$_POST['format'];
    $matricule_lieu=$_POST['lieu'];
    $dateexpiring=$_POST['dateexpiring'];

        $quantity=$_POST['quantity'];
        $matricule_situation=$_POST['situation'];
       
			$objectCreated=new GerantCMU();

		echo"<script>alert('');</script>";
        echo$nameartcl.$dateexpiring.$matricule_situation.$quantity.$matricule_format.$matricule_lieu;
        echo"<br>matricule_format".$matricule_format;
		 $objectCreated->addexpiringarticle($nameartcl,$dateexpiring,$matricule_situation,$quantity,$matricule_format,$matricule_lieu);


}


    ob_end_flush(); // Flush the output from the buffer

?>