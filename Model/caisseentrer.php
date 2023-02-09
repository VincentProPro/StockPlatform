<?php
require("../authentification.php");
require("../config.php");

class CaisseEntrer{

	private $matricule;
	private $titre;
	private $payement;
	private $prix;
	private $recu;
	private $description;
	private $matriculredacteur;
	private $matricule_module;
	
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

				
				// public function getfullname(){
				// 	return $this->fullname;
				// 	}
				// public function getmatricule(){
				// 	return $this->matricule;
				// 	}
				// public function getrole(){
				// 	return $this->role;
				// 	}
				// public function getposition(){
				// 	return $this->position;
				// 	}
				// public function gettel(){
				// 	return $this->tel;
				// 	}
				// public function getemail(){
				// 	return $this->email;
				// 	}
				// public function getstatus(){
				// 	return $this->status;
				// 	}

				
    			public function ajouter($titre,$description,$matricule_module,$prix,$recu,$payement){
				    	// $this->matricule=$matricule;

						$this->titre=$titre;
						$this->prix=$prix;
						$this->payement=$payement;
						$this->recu=$recu;
						$this->description=$description;
						$this->matricule_module=$matricule_module;

						// echo"this->fullname: ".$this->fullname;
						try{

													$t=time();
			           		$datereel=date("Y-m-d H:i:s",$t);
			            	$redacteurcode=$_SESSION["email"];
			            	// $redacteurcode="_SESSION";
			            	            	         include('../config.php');
			            	            	            $sql="insert into caisse (titre,description,prix,recu,payement,matricule_module,matriculredacteur,lastmodification) values (:titre,:description,:prix,:recu,:payement,:matricule_module,:matriculredacteur,:lastmodification)";
			             	 if($stmt = $pdo->prepare($sql)){
			                      $stmt->bindParam(":titre", $this->titre, PDO::PARAM_STR);
			                      $stmt->bindParam(":prix", $this->prix, PDO::PARAM_STR);
			                      $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
			                      $stmt->bindParam(":recu", $this->recu, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule_module", $this->matricule_module, PDO::PARAM_STR);
			                      $stmt->bindParam(":payement", $this->payement, PDO::PARAM_STR);
			                      
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);

			                        if($stmt->execute()){
			                        														return "Le caisse a bien ete ajouté ";


			                               



			                        }
			                        else{
			                        	 return "La caisse n'a pas ete ajouté, Requete Invalid veuillez retenter ";
			                        	


			                        }
			                    }else{
			                    		 return "Le caisse n'a pas ete ajouté, Requete Invalid Execution Fail veuillez retenter ";


			                    }


												}catch(exception $e){

												return "Le caisse n'a pas ete ajouté, Requete Invalid veuillez retenter Error:".$e;

												}
    		


			     
           				}


            	public function modifier($matricule,$nom,$description){

									// $this->code=$this->generatecode($nom);

									$this->nom=$nom;
									$this->description=$description;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  caisse Set nom=:nom , description=:description , matriculredacteur=:matriculredacteur , lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

			                      $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
			                      $stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
			                      
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le caisse a ben été modifié";


											            }
											            else{
											            	return "Le caisse n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le caisse n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }



		
				public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from caisse Where  matricule = :matricule  ";
											                	            	         include('../config.php');


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
											    $sql="Select * from caisse";
											                	            	         include('../config.php');


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
														    $sql="Delete from caisse Where  matricule = :matricule  ";
														                	            	         include('../config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "Le Magasin a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }
		

	
}

// $objectCreated=new CaisseEntrer();
// echo $objectCreated->ajouter("titre",999,888,900,"payement");
// echo $objectCreated->modifier("2","edit nom","editdescription");
// echo $objectCreated->supprimer("5");
// print_r($objectCreated->selectmagazincode("MGS01")) ;
// print_r($objectCreated->selectmatricule("2"));
// print_r($objectCreated->selectAll());

	?>

