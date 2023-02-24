<?php 
// 
require("../authentification.php");
require("achatcoursier.php");

class Coursier{
	private $email;
	// public $commande=new Commande();

	function __construct(){}
	 function callnotification($messageici, $locationpage){
		// echo"callnotification \n ";
		include("message.php");

				echo "Message: ".$messageici." goto $locationpage";

				$messageObject=new Messager($messageici, $locationpage);
                               $messageObject->sendmessage();

		}

	function achatentrer($designation,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$matricule_format,$benefice,$matricule_comand,$numfacture){

		$achatCoursier=new AchatCoursier();
				echo"achatCoursier";

		// return $achatCoursier->ajouter($designation,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$matricule_format,$benefice,$matricule_comand,$numfacture);
		// 				 echo"before include article";

				
		$this->callnotification($achatCoursier->ajouter($designation,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$matricule_format,$benefice,$matricule_comand,$numfacture),"../coursier/welcomecoursier.php");

	}
		

	function viewAllCommandeValider(){
				$commande=new Commande();

		return $commande->selectAllValider();
		
	}
	

	function viewAllExecuter(){
				$commande=new Commande();

		return $commande->selectAllExecuter();
		
	}


}

// $objectCreated=new Coursier();
// echo"objectCreated";
// $objectCreated->achatentrer("Boite Spasfon 500mg",888.0,9.9,99,99,"description",9.9,2,88.00,39,"vincent555");
// // echo$objectCreated->achatentrer("Boite Spasfon 500mg",66,66,67,5,"description",9,2,6,39,"numfacture");


?>