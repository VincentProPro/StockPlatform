<?php 

require("../authentification.php");
require("achatentrer.php");
require("sortimagasin.php");
require("sortidetailmagasin.php");
require("achatcoursier.php");
require("category.php");
require("fourniseur.php");
require("module.php");
require("lieu.php");
require("situation.php");
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
	function createcategory($nom,$description){
		$objectCreated=new Category();
		$this->callnotification($objectCreated->ajouter($nom,$description),"../gestionnairestock/Category/categorymanage.php");
	}
	function editcategory($matricule,$code,$nom,$description){
		$objectCreated=new Category();
		$this->callnotification($objectCreated->modifier($matricule,$code,$nom,$description),"../gestionnairestock/Category/categorymanage.php");
	}
	function deletecategory($matricule){
		$objectCreated=new Category();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Category/categorymanage.php");
	}
	function createfournisseur($nom,$email,$tel,$plusinfo,$location){
		$objectCreated=new Fourniseur();
		$this->callnotification($objectCreated->ajouter($nom,$email,$tel,$plusinfo,$location),"../gestionnairestock/Fournisseur/fournisseurmanage.php");
	}
	function editfournisseur($matricule,$nom,$email,$tel,$plusinfo,$location){
		$objectCreated=new Fourniseur();
		$this->callnotification($objectCreated->modifier($matricule,$nom,$email,$tel,$plusinfo,$location),"../gestionnairestock/Fournisseur/fournisseurmanage.php");
	}
	function deletefournisseur($matricule){
		$objectCreated=new Fourniseur();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Fournisseur/fournisseurmanage.php");
	}

	function createarticle($designation,$prixachat,$prixvente,$code_category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc){
		$objectCreated=new Article();
		// echo$objectCreated->ajouter($designation,$prixachat,$prixvente,$code_category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc);
		$this->callnotification($objectCreated->ajouter($designation,$prixachat,$prixvente,$code_category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc),"../gestionnairestock/Article/articlemanage.php");
	}
	function editarticle($matricule,$groupcode,$designation,$prixachat,$prixvente,$category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc){
		$objectCreated=new Article();
		echo"In gestionnaire >> matricule ".$matricule." groupcode: ".$groupcode." designation: ".$designation." prixachat :".$prixachat." prixvente: ".$prixvente." category : ".$category." quantity_per_unit : ".$quantity_per_unit." description : ".$description." poids_kg: ".$poids_kg." format : ".$format." benefice: ".($prixvente-$prixachat)." tmc : ".$tmc;

		$this->callnotification($objectCreated->modifier($matricule,$groupcode,$designation,$prixachat,$prixvente,$category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc),"../gestionnairestock/Article/articlemanage.php");
		// echo$objectCreated->modifier($matricule,$groupcode,$designation,$prixachat,$prixvente,$category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc);
	}
	function deletearticle($matricule){
		$objectCreated=new Article();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Article/articlemanage.php");
	}



	function createformat($nom,$description){
		$objectCreated=new Format();
		$this->callnotification($objectCreated->ajouter($nom,$description),"../gestionnairestock/Format/formatmanage.php");
	}
	function editformat($matricule,$code,$nom,$description){
		$objectCreated=new Format();
		$this->callnotification($objectCreated->modifier($matricule,$code,$nom,$description),"../gestionnairestock/Format/formatmanage.php");
	}
	function deleteformat($matricule){
		$objectCreated=new Format();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Format/formatmanage.php");
	}

	function createlieu($nom,$description){
		$objectCreated=new Lieu();
		$this->callnotification($objectCreated->ajouter($nom,$description),"../gestionnairestock/Lieu/lieumanage.php");
	}
	function editlieu($matricule,$nom,$description){
		$objectCreated=new Lieu();
		$this->callnotification($objectCreated->modifier($matricule,$nom,$description),"../gestionnairestock/Lieu/lieumanage.php");
	}
	function deletelieu($matricule){
		$objectCreated=new Lieu();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Lieu/lieumanage.php");
	}


	function createmodule($nom,$description){
		$objectCreated=new Module();
		$this->callnotification($objectCreated->ajouter($nom,$description),"../gestionnairestock/Module/modulemanage.php");
	}
	function editmodule($matricule,$nom,$description){
		$objectCreated=new Module();
		$this->callnotification($objectCreated->modifier($matricule,$nom,$description),"../gestionnairestock/Module/modulemanage.php");
	}
	function deletemodule($matricule){
		$objectCreated=new Module();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Module/modulemanage.php");
	}

	function createsituation($nom,$description,$matricule_module){
		$objectCreated=new Situation();
		$this->callnotification($objectCreated->ajouter($nom,$description,$matricule_module),"../gestionnairestock/Situation/situationmanage.php");
	}
	function editsituation($matricule,$code,$nom,$description,$matricule_module){
		$objectCreated=new Situation();
		$this->callnotification($objectCreated->modifier($matricule,$nom,$description,$matricule_module),"../gestionnairestock/Situation/situationmanage.php");
	}
	function deletesituation($matricule){
		$objectCreated=new Situation();
		$this->callnotification($objectCreated->supprimer($matricule),"../gestionnairestock/Situation/situationmanage.php");
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