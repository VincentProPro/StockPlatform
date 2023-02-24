<?php 

require("../authentification.php");
require("achatentrer.php");
require("sortimagasin.php");
require("achatcoursier.php");
require("sortidetailmagasin.php");
require("cmustock.php");
require("cmuentrer.php");
require("message.php");



class Surveillante{
	private $email;

	function __construct(){}
	 function callnotification($messageici, $locationpage){			
				$messageObject=new Messager($messageici, $locationpage);
                               $messageObject->sendmessage($messageici, $locationpage);

		}

	function generatebesoin($libeller,$description,$tarif,$magazincode,$situation){
		$commande=new Commande();
		$this->callnotification($commande->ajouter($libeller,$description,$tarif,$magazincode,$situation),"../surveillante/welcomsurveillante.php");

	}	
	function generatesortimagasin($matricule_magasin,$matricule_module,$libeller){
		$objectCreated=new Sortimagasin();
		$this->callnotification($objectCreated->ajouter($matricule_magasin,$matricule_module,$libeller),"../surveillante/welcomsurveillante.php");

	}
	function executeretrait($matricule){
		$objectCreated=new Sortimagasin();
		$this->callnotification($objectCreated->executesortimagasin($matricule),"../gestionnairestock/welcomestocker.php");

	}
		function executebesoin($matricule){
		$commande=new Commande();
		$this->callnotification($commande->executeCommande($matricule),"../surveillante/welcomsurveillante.php");

	}
		function validationAchatEntrer($matricule){
		$objectCreated=new AchatEntrer();
		$this->callnotification($objectCreated->validationAchatEntrer($matricule,"1"),"../surveillante/welcomsurveillante.php");

	}

	function validationSortidetailmagasin($matricule){
		$objectCreated=new Sortidetailmagasin();
		$matricule_module=$objectCreated->validationsorti($matricule,"1");
		$message="Validation effctuée";
			// echo"matricule_module== $matricule_module";
				if($matricule_module==1){
					echo"matricule_module==1";
					// insert in cmuentrere
					$arraysorti=$objectCreated->selectmatricule($matricule);
					$cmuentrer=new Cmuentrer();
					$entrerMagasin=new EntrerMagasin();
					//set prix d'achat et prix de vente from entrer magasin
					$arrayentrer=$entrerMagasin->selectmatricule_article($arraysorti[0][2]);
					$prixachat=(($arraysorti[0][5]*$arraysorti[0][7])*$arrayentrer[0][7])/($arrayentrer[0][4]*$arrayentrer[0][6]);
					$taxe=0.2;
					$prixvente=$prixachat+($prixachat*$taxe);
					$benefice=$prixvente-$prixachat;
					
					$message=$cmuentrer->ajouter($arraysorti[0][2],$arraysorti[0][3],$prixachat,$prixvente,($arraysorti[0][5]*$arraysorti[0][7]),1,$arraysorti[0][1],$arraysorti[0][11],$benefice,$taxe);
				}
				echo"$message";
		// break;
		$this->callnotification($message,"../surveillante/welcomsurveillante.php");

	}
	function validationCoursier($matricule){
		echo"in validation";

		$objectCreated=new AchatCoursier();
		// echo$objectCreated->validationAchatCoursier($matricule,"1");
		// $achatcoursier=$objectCreated->selectmatricule($matricule);
		// updatesotck($achatcoursier);
		// print_r($achatcoursier);
		// $objectCreated1=new EntrerMagasin();
		// echo "EntrerMagasin ajouter>>>>>";


		// echo$objectCreated1->ajouter($achatcoursier[0][1],$achatcoursier[0][3],$achatcoursier[0][4],$achatcoursier[0][5],$achatcoursier[0][6],$achatcoursier[0][2],$achatcoursier[0][7],$achatcoursier[0][8],$achatcoursier[0][11]);




		$this->callnotification($objectCreated->validationAchatCoursier($matricule,"1"),"../surveillante/welcomsurveillante.php");

	}
	// function updatesotck($achatcoursier){
	// 	echo"gooo1"
	// 		$objectCreated1=new EntrerMagasin();
	// 	echo "EntrerMagasin ajouter>>>>>";
	// 	$article=new Article();
	// 			$commande=new Commande();
	// 			$magasin=new Magasin();
	// 			$stockmagasin=new Stockmagasin();
	// 			echo"select selectQty";
	// 			$previousqty=$stockmagasin->selectQty($achatcoursier[0][1]);
	// 			$currentqty=$achatcoursier[0][5]+$previousqty;
	// 							echo"select commande->selectmatricule(";

	// 			$magazincode=$commande->selectmatricule($achatcoursier[0][11])[0][4];
	// 											echo"select magasin->selectmagazincode(";
	// 			$matricule_magazin=$magasin->selectmagazincode($magazincode)[0][0];

	// 			echo"select article->selectmatricule(";

	// 			$groupcode_article=$article->selectmatricule($achatcoursier[0][1])[0][3];
	// 			// $matricule_article,$prixachat,$prixvente,$quantity,$quantityperunit,$poids,$matricule_format,$benefice,$matricule_comand


	// 	echo"goooo";
	// 	echo$objectCreated1->ajouterdeux($achatcoursier[0][1],$achatcoursier[0][3],$achatcoursier[0][4],$achatcoursier[0][5],$achatcoursier[0][6],$achatcoursier[0][2],$achatcoursier[0][7],$achatcoursier[0][8],$achatcoursier[0][11],$previousqty,$currentqty,$magazincode,$matricule_magazin,$groupcode_article);


	// }

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

	function viewAllAchatCoursierValider(){
				$achatCoursier=new AchatCoursier();

		return $achatCoursier->selectAllValider();
		
	}
	function viewAllAchatCoursiernonValider(){
				$achatCoursier=new AchatCoursier();

		return $achatCoursier->selectAllNonValider();
		
	}
	function viewAllNonExecuter(){
				$commande=new Commande();

		return $commande->selectAllNonExecuter();
		
	}

	function viewAllExecuter(){
				$commande=new Commande();

		return $commande->selectAllExecuter();
		
	}




	function viewAllachatentrer(){
				$objectCreated=new AchatEntrer();

		return $objectCreated->selectAll();


	}
	

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
	
	function viewAllCmuStock(){
		$objectCreated=new CmuStock();

		return $objectCreated->selectAll();


	}
	function viewAllMagasinStock(){
		$objectCreated=new Stockmagasin();

		return $objectCreated->selectAll();


	}
	// function viewAllCmuEntrerValider(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAllValider();
		
	// }
	// function viewAllCmuEntrernonValider(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAllNonValider();
		
	// }

	// function viewAllCmuSortiValider(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAllValider();
		
	// }
	// function viewAllCmuSortinonValider(){
	// 			$objectCreated=new AchatEntrer();

	// 	return $objectCreated->selectAllNonValider();
		
	// }

}

// $objectCreated=new Surveillante();
// print_r($objectCreated->viewAllAchatEntrerValider());
// print_r($objectCreated->viewAllAchatEntrernonValider());
// print_r($objectCreated->viewAllSortiNonExecuter());
// print_r($objectCreated->viewAllSortiExecuter());
// print_r($objectCreated->viewAllSortiExecuter());
// print_r($objectCreated->viewAllRetraitDetailValider());
// print_r($objectCreated->viewAllRetraitDetailnonValider());
// echo $objectCreated->ajouter(99,77,"libelle");
// echo $objectCreated->modifier("1",777,111,"edit libelle");
// echo $objectCreated->validationSortidetailmagasin("38","1");
// echo$objectCreated->validationCoursier("93");


// print_r($objectCreated->selectmatricule("1"));
// echo $objectCreated->supprimer("1");

// print_r($objectCreated->viewAllSortiExecuter());



?>