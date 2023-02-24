<?php
require("../authentification.php");
require("../db/config.php");

class Commande{

	private $matricule;
	private $libeller;
	private $tarif;
	private $description;
	private $magazincode;
	private $situation;

	private $status;
	private $validation;
	private $tempsvalidation;
	private $matriculevalidation;
	private $redacteurcode;

	function __construct(){}
	// function __construct($matricule,$fullname,$email,$tel,$position,$role,$status){
	// 	$this->fullname=$fullname;
	// 	$this->email=$email;
	// 	$this->tel=$tel;
	// 	$this->position=$position;
	// 	$this->role=$role;
	// 	$this->matricule=$matricule;
	// 	$this->status=$status;

	// }

	function setparam($code,$libeller,$tarif,$description,$magazincode,$situation,$validation,$tempsvalidation,$matriculevalidation,$redacteurcode){
		// $this->tempsvalidation=$tempsvalidation;
		// $this->description=$description;
		// $this->matriculevalidation=$matriculevalidation;
		// $this->validation=$validation;
		// $this->magazincode=$magazincode;
		// $this->redacteurcode=$redacteurcode;
		// $this->libeller=$libeller;
		// $this->tarif=$tarif;
		// $this->situation=$situation;
		// $this->matricule=$code;


	}

    	// public function callnotification($messageici, $locationpage){
					// 	echo"callnotification \n ";
					// 			echo "Message: ".$messageici." goto $locationpage";

					// 			// $messageObject=new Message($messageici, $locationpage);
				 //     //                           $messageObject->sendmessage();

					// 	}
	public function ajouter($libeller,$description,$tarif,$magazincode,$situation){
				$this->description=$description;
				$this->magazincode=$magazincode;
				$this->libeller=$libeller;
				$this->tarif=$tarif;
				$this->situation=$situation;



		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	// $redacteurcode="_SESSION";
		            	            	         include('../db/config.php');



		    	    $sql="insert into  bondecommandedb (libeller,tarif,magazincode,description,situation,lastmodification,matriculredacteur) values ( :libeller, :tarif,:magazincode,:description,:situation,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                                                    $stmt->bindParam(":libeller", $this->libeller, PDO::PARAM_STR);
                                                    $stmt->bindParam(":tarif", $this->tarif, PDO::PARAM_STR);
                                                    $stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":situation", $this->situation, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);

		                        if($stmt->execute()){
		                               	return "Le Besoin de Commande a ben été enregistré";




		                        }
		                        else{
		                        	return "Le Besoin de Commande n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "Le Besoin de Commande n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


       public function modifier($matricule,$libeller,$description,$tarif,$magazincode,$situation){

									$this->description=$description;
									$this->magazincode=$magazincode;
									$this->libeller=$libeller;
									$this->tarif=$tarif;
									$this->situation=$situation;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  bondecommandedb Set libeller=:libeller, magazincode=:magazincode , description=:description ,situation=:situation,tarif=:tarif, matriculredacteur=:matriculredacteur , lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":libeller", $this->libeller, PDO::PARAM_STR);
											 $stmt->bindParam(":situation", $this->situation, PDO::PARAM_STR);
											 $stmt->bindParam(":tarif", $this->tarif, PDO::PARAM_STR);
			                      $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
			                      $stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
			                      
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le bondecommandedb a ben été modifié";


											            }
											            else{
											            	return "Le bondecommandedb n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le bondecommandedb n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

	public function validationCommande($matricule,$validation){

									$this->validation=$validation;
									
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
					            	$this->matriculevalidation=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  bondecommandedb Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation, lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
											 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
											 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le bondecommandedb a ben été validé";


											            }
											            else{
											            	return "Le bondecommandedb n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le bondecommandedb n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

	public function executeCommande($matricule){

									
									$this->matricule=$matricule;
					    			

	    	            	         try{

	    	            	         	   $sql="Update  bondecommandedb Set status=:status  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){
				                        	$status="1";

											
			                      
			                      $stmt->bindParam(":status", $status, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le bondecommandedb a ben été execute";


											            }
											            else{
											            	return "Le bondecommandedb n'a pas ete execute correctement, Requete Invalid veuillez retenter ";


											            }}else{
											            	echo"bad request";
											            }

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le bondecommandedb n'a pas ete execute, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		
	public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from bondecommandedb Where  matricule = :matricule  ";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable;

											        	 }else{
											        	 	return "none";
											        	 }
											        	
											          

											        }
											        else{
											        	 return "La selection a échoué, veuillez retenter.";
											        }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }

	public function selectAll(){
    			

						            	  try{
											    $sql="Select * from bondecommandedb";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable;

											        	 }else{
											        	 	return "none";
											        	 }
											          

											        }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }
	public function selectAllNonValider(){
    			

						            	  try{
											    $sql="Select * from bondecommandedb Where validation=0";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable;

											        	 }else{
											        	 	return "none";
											        	 }
											          

											        }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }
	public function selectAllValider(){
    			

						            	  try{
											    $sql="Select * from bondecommandedb Where validation=1";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable;

											        	 }else{
											        	 	return "none";
											        	 }
											          

											        }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }
	
	public function selectAllExecuter(){
    			

						            	  try{
											    $sql="Select * from bondecommandedb Where status='1'";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable;

											        	 }else{
											        	 	return "none";
											        	 }
											          

											        }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }							
	public function selectAllNonExecuter(){
    			

						            	  try{
											    $sql="Select * from bondecommandedb Where status='En attente' And validation=1";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable;

											        	 }else{
											        	 	return "none";
											        	 }
											          

											        }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }							
	public function supprimer($matricule){
			    							$this->matricule=$matricule;
			    			

									            	  try{
														    $sql="Delete from bondecommandedb Where  matricule = :matricule  ";
														                	            	         include('../db/config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "Le bondecommandedb a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

// echo"execute";
// $objectCreated=new Commande();
// echo $objectCreated->ajouter("paracetamol","description","666","magazincode","situation");
// echo $objectCreated->modifier("7","libeller7","description","555","magazincode","situation");
// echo $objectCreated->validationCommande("25","1");
// echo $objectCreated->executeCommande("25");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("7");
// print_r($objectCreated->selectmatricule("7"));
// print_r($objectCreated->selectAll());

	?>