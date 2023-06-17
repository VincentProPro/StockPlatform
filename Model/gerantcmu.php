<?php 

require("../authentification.php");

require("article.php");
require("cmuentrer.php");
require("cmusorti.php");
require("cmustock.php");
// require("../db/config.php");

require("expiringarticle.php");

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

		function executeretrait($article_matricule,$quantity,$situation_matricule,$numerofacture,$dateexpiring){
		$objectCreated=new Cmusorti();
		echo"hood";
		// echo$objectCreated->ajouter($article_matricule,$quantity,$situation_matricule,$numerofacture,$dateexpiring);
		$this->callnotification($objectCreated->ajouter($article_matricule,$quantity,$situation_matricule,$numerofacture,$dateexpiring),"../cmu/welcomecmu.php");

	}

	function addexpiringarticle($name_article,$dateexpiring,$matricule_situation,$quantity,$matricule_format,$matricule_lieu){
		$objectCreated=new ExpiringArticle();
		// echo$objectCreated->ajouter($name_article,$dateexpiring,$matricule_situation,$quantity,$matricule_format,$matricule_lieu);
		$this->callnotification($objectCreated->ajouter($name_article,$dateexpiring,$matricule_situation,$quantity,$matricule_format,$matricule_lieu),"../cmu/welcomecmu.php");

	}
	


	function viewstockcmu(){
				$objectCreated=new CmuStock();

		return $objectCreated->selectAll();


	}
	

	function viewentrercmu(){
				$objectCreated=new Cmuentrer();
				//erreur

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

		return $objectCreated->selectAllPeriodeSorti($debutperiode,$finperiode);
		
	}
	function viewsorticmuMois(){
		$objectCreated=new Cmusorti();

return $objectCreated->selectAllMois();

}
	function viewsorticmuThreeMois(){
		$objectCreated=new Cmusorti();

return $objectCreated->selectAllThreeMois();

}
function viewsorticmuSixMois(){
	$objectCreated=new Cmusorti();

return $objectCreated->selectAllSixMois();

}
function viewsorticmuAllYear(){
	$objectCreated=new Cmusorti();

return $objectCreated->selectAllYear();

}
function viewStockExpiringInThree(){
	$objectCreated=new ExpiringArticle();

return $objectCreated->selectAllInthreeMois();

}
function viewStockExpiringInSix(){
	$objectCreated=new ExpiringArticle();

return $objectCreated->selectAllInSixMois();

}
// function viewStockExpiringInYear(){
// 	$objectCreated=new ExpiringArticle();

// return $objectCreated->selectAllInYear();

// }
	
	
	
	

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