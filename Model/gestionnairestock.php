<?php 

require("../authentification.php");
require("achatentrer.php");
require("sortimagasin.php");
require("sortidetailmagasin.php");
require("achatcoursier.php");
// require("../AutreClass/message.php");
require("message.php");

class Gestionnairestock{
	private $email;
	// public $commande=new Commande();

	function __construct(){}
	 function callnotification($messageici, $locationpage){
		// echo"callnotification \n ";
				// echo "Message: ".$messageici." goto $locationpage";

				$messageObject=new Messager($messageici, $locationpage);
                               $messageObject->sendmessage();

		}
	function createfournisseur($nom,$email,$tel,$plusinfo,$location){
		$objectCreated=new Fourniseur();
		$this->callnotification($objectCreated->ajouter($nom,$email,$tel,$plusinfo,$location),"../gestionnairestock/welcomestocker.php");


	}
	function editfournisseur(){
		$objectCreated=new Fourniseur();
		$this->callnotification($objectCreated->modifier($matricule,$nom,$email,$tel,$plusinfo,$location),"../gestionnairestock/welcomestocker.php");


	}
	function deletefournisseur(){
		$objectCreated=new Fourniseur();
		$this->callnotification($objectCreated->delete($matricule),"../gestionnairestock/welcomestocker.php");


	}

	function generateachatentrer($magasin,$reference,$libeller,$tarif,$fournicode,$numcomand,$numfacture){
		$objectCreated=new AchatEntrer();
		$this->callnotification($objectCreated->ajouter($magasin,$reference,$libeller,$tarif,$fournicode,$numcomand,$numfacture),"../gestionnairestock/welcomestocker.php");

	}

	function generatedetailsortimagasin($matricule_sorti,$article,$matricule_format,$quantity,$quantityperunit,$matricule_magasin){

		echo"good ";
		$objectCreated=new Sortidetailmagasin();
		// echo $objectCreated->ajouter(2,"Boite Dafalgan 500mg",2,14,5,1);
		$this->callnotification($objectCreated->ajouter($matricule_sorti,$article,$matricule_format,$quantity,$quantityperunit,$matricule_magasin),"../gestionnairestock/welcomestocker.php");

	}
		function executeretrait($matricule){
		$objectCreated=new Sortimagasin();
		$this->callnotification($objectCreated->executesortimagasin($matricule),"../gestionnairestock/welcomestocker.php");

	}
	function validationAchatCoursier($matricule){
		$objectCreated=new AchatCoursier();
		$objectCreated->validationAchatCoursier($matricule,"1");
		// $this->callnotification($objectCreated->validationAchatCoursier($matricule,"1"),"../surveillante/welcomsurveillante.php");

	}

	function viewAllAchatCoursierValider(){
				$achatCoursier=new AchatCoursier();

		return $achatCoursier->selectAllValider();
		
	}
	function viewAllAchatCoursiernonValider(){
				$achatCoursier=new AchatCoursier();

		return $achatCoursier->selectAllNonValider();
		
	}
	function viewAllStockMagasin(){
			$objectCreated=new Stockmagasin();

			return $objectCreated->selectAll();


		}
	// function viewAllAchatEntrer(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAll();


	// }
	

	// function viewAllAchatEntrerValider(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAllValider();
		
	// }
	// function viewAllAchatEntrernonValider(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAllNonValider();
		
	// }
	// function viewAllNonExecuter(){
	// 			$objectCreated=new Sortimagasin();

	// 	return $objectCreated->selectAllNonExecuter();
		
	// }

	// function viewAllExecuter(){
	// 			$objectCreated=new Sortimagasin();

	// 	return $objectCreated->selectAllExecuter();
		
	// }



	function viewAllAchatEntrerValider(){
				$objectCreated=new AchatEntrer();

		return $objectCreated->selectAllValider();
		
	}
	function viewAllAchatEntrernonValider(){
				$objectCreated=new AchatEntrer();

		return $objectCreated->selectAllNonValider();
		
	}


	function viewAllRetraitDetailValider(){
				$objectCreated=new Sortidetailmagasin();

		return $objectCreated->selectAllValider();
		
	}
	function viewAllRetraitDetailnonValider(){
				$objectCreated=new Sortidetailmagasin();

		return $objectCreated->selectAllNonValider();
		
	}


	function viewAllSortiNonExecuter(){
				$objectCreated=new Sortimagasin();

		return $objectCreated->selectAllNonExecuter();
		
	}

	function viewAllSortiExecuter(){
				$objectCreated=new Sortimagasin();

		return $objectCreated->selectAllExecuter();
		
	}


}


// $objectCreated=new Gestionnairestock();
// $objectCreated->generateachatentrer("magasin","reference","libeller","tarif","2","numcomand","numfacture");
// echo $objectCreated->generatedetailsortimagasin(98,"Boite Spasfon 500mg",22,3,50);

// echo"execute";


?>