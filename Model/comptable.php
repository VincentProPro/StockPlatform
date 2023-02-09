<?php 

require("../authentification.php");
require("besoin.php");
// require("../AutreClass/message.php");
require("message.php");

class Comptable{
	private $email;
	// public $commande=new Commande();

	function __construct(){}
	 function callnotification($messageici, $locationpage){
		// echo"callnotification \n ";
				// echo "Message: ".$messageici." goto $locationpage";

				$messageObject=new Messager($messageici, $locationpage);
                               $messageObject->sendmessage();

		}

	function generatebesoin($libeller,$description,$tarif,$magazincode,$situation){
		$commande=new Commande();
		$this->callnotification($commande->ajouter($libeller,$description,$tarif,$magazincode,$situation),"../comptable/welcomecomptable.php");

	}
		function executebesoin($matricule){
		$commande=new Commande();
		$this->callnotification($commande->executeCommande($matricule),"../comptable/welcomecomptable.php");

	}
	function  executevalidationCommande($matricule,$validation){
		$commande=new Commande();
		
		$this->callnotification($commande->validationCommande($matricule,$validation),"../comptable/welcomecomptable.php");

	}

	function viewAllCommande(){
				$commande=new Commande();

		return $commande->selectAll();


	}
	

	function viewAllCommandeValider(){
				$commande=new Commande();

		return $commande->selectAllValider();
		
	}
	function viewAllCommandenonValider(){
				$commande=new Commande();

		return $commande->selectAllNonValider();
		
	}
	function viewAllNonExecuter(){
				$commande=new Commande();

		return $commande->selectAllNonExecuter();
		
	}

	function viewAllExecuter(){
				$commande=new Commande();

		return $commande->selectAllExecuter();
		
	}


}



?>