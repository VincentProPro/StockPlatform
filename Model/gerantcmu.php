<?php 

require("../authentification.php");

require("article.php");
require("cmuentrer.php");
require("cmusorti.php");
require("cmustock.php");

// require("../AutreClass/message.php");
require("message.php");

class GerantCMU{
	private $email;
	// public $commande=new Commande();

	function __construct(){}
	 function callnotification($messageici, $locationpage){
		// echo"callnotification \n ";
				// echo "Message: ".$messageici." goto $locationpage";

				$messageObject=new Messager($messageici, $locationpage);
                               $messageObject->sendmessage();

		}

		function executeretrait($article_matricule,$quantity,$situation_matricule,$numerofacture){
		$objectCreated=new Cmusorti();
		echo"hood";
		$this->callnotification($objectCreated->ajouter($article_matricule,$quantity,$situation_matricule,$numerofacture),"../cmu/welcomecmu.php");

	}


	function viewstockcmu(){
				$objectCreated=new CmuStock();

		return $objectCreated->selectAll();


	}
	

	function viewentrercmu(){
				$objectCreated=new Cmuentrer();

		return $objectCreated->selectAllValider();
		
	}
	function viewsorticmu(){
				$objectCreated=new Cmusorti();

		return $objectCreated->selectAll();
		
	}

	function viewentrercmuPeriode($debutperiode,$finperiode){
				$objectCreated=new Cmuentrer();

		return $objectCreated->selectAllPeriode($debutperiode,$finperiode);
		
	}
	function viewsorticmuPeriode($debutperiode,$finperiode){
				$objectCreated=new Cmusorti();

		return $objectCreated->selectAllPeriode($debutperiode,$finperiode);
		
	}
	// function viewAllNonExecuter(){
	// 			$objectCreated=new Sortimagasin();

	// 	return $objectCreated->selectAllNonExecuter();
		
	// }

	// function viewAllExecuter(){
	// 			$objectCreated=new Sortimagasin();

	// 	return $objectCreated->selectAllExecuter();
		
	// }





}


// $objectCreated=new Gestionnairestock();
// $objectCreated->generateachatentrer("magasin","reference","libeller","tarif","2","numcomand","numfacture");
// echo $objectCreated->generatedetailsortimagasin(98,"Boite Spasfon 500mg",22,3,50);

// echo"execute";


?>