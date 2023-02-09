<?php 

require("../authentification.php");
require("besoin.php");
// require("../AutreClass/message.php");
require("cmustock.php");
require("message.php");
require("caisseentrer.php");

class Caisse{
	private $email;
	// public $commande=new Commande();

	function __construct(){}
	 function callnotification($messageici, $locationpage){
		// echo"callnotification \n ";
				// echo "Message: ".$messageici." goto $locationpage";

				$messageObject=new Messager($messageici, $locationpage);
                               $messageObject->sendmessage();

		}

	function ajoutcaisse($module,$titre,$description,$prix,$recu,$apayer){

		$caisseEntrer=new CaisseEntrer();

		$this->callnotification($caisseEntrer->ajouter($titre,$description,$module,$prix,$recu,$apayer),"../caisse/welcomecaisse.php");
	}
	

	function viewAllCommandeValider(){
				$commande=new Commande();

		return $commande->selectAllValider();
		
	}
	

	function viewAllExecuter(){
				$commande=new Commande();

		return $commande->selectAllExecuter();
		
	}
	function viewAllCmuStock(){
			$objectCreated=new CmuStock();

			return $objectCreated->selectAll();


		}


}



?>