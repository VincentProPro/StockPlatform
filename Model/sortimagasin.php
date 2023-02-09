<?php
require("../authentification.php");
require("../config.php");
echo" Sortimagasin class ";

class Sortimagasin{

		private $matricule;
	private $matricule_magasin;
	private $matricule_module;
	private $libeller;


	private $matriculevalidation;
	private $tempsvalidation;

	private $matriculredacteur;
	private $validation;

	private $date;
	private $lastmodification;


	
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

	// function setparam($code,$libeller,$tarif,$description,$magazincode,$situation,$validation,$tempsvalidation,$matriculevalidation,$redacteurcode){
	// 	// $this->tempsvalidation=$tempsvalidation;
	// 	// $this->description=$description;
	// 	// $this->matriculevalidation=$matriculevalidation;
	// 	// $this->validation=$validation;
	// 	// $this->magazincode=$magazincode;
	// 	// $this->redacteurcode=$redacteurcode;
	// 	// $this->libeller=$libeller;
	// 	// $this->tarif=$tarif;
	// 	// $this->situation=$situation;
	// 	// $this->matricule=$code;


	// }

    	// public function callnotification($messageici, $locationpage){
					// 	echo"callnotification \n ";
					// 			echo "Message: ".$messageici." goto $locationpage";

					// 			// $messageObject=new Message($messageici, $locationpage);
				 //     //                           $messageObject->sendmessage();

					// 	}
		public function ajouter($matricule_magasin,$matricule_module,$libeller){
				$this->matricule_module=$matricule_module;
				$this->matricule_magasin=$matricule_magasin;
				$this->libeller=$libeller;
				





		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	$redacteurcode=$_SESSION["matricule"];

		            	date_default_timezone_set('Africa/Porto-Novo');
						$current_time = date('h:i:s');
						// date("Y-m-d H:i:s",$t);
						$current_date = date('Y-m-d');
						$this->date=$current_date;


		            	// $redacteurcode="_SESSION";
		            	            	         include('../config.php');

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="insert into  sortimagasin (matricule_magasin,libeller,matricule_module,date,lastmodification,matriculredacteur) values ( :matricule_magasin,:libeller,:matricule_module,:date,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    
                                                    $stmt->bindParam(":libeller", $this->libeller, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_magasin", $this->matricule_magasin, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_module", $this->matricule_module, PDO::PARAM_STR);
                                                    $stmt->bindParam(":date", $this->date, PDO::PARAM_STR);

                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                               	return "La Sortimagasin  a ben été enregistré";




		                        }
		                        else{
		                        	return "La Sortimagasin n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "La Sortimagasin  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


            public function modifier($matricule,$matricule_magasin,$matricule_module,$libeller){

									$this->matricule_module=$matricule_module;
									$this->matricule_magasin=$matricule_magasin;
									$this->libeller=$libeller;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  sortimagasin Set matricule_magasin=:matricule_magasin, matricule_module=:matricule_module , libeller=:libeller ,lastmodification=:lastmodification  WHERE matricule=:matricule";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

                                                    $stmt->bindParam(":matricule_module", $this->matricule_module, PDO::PARAM_STR);
                                                    $stmt->bindParam(":libeller", $this->libeller, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_magasin", $this->matricule_magasin, PDO::PARAM_STR);
                                                    
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "La Sortimagasin  a ben été modifié";


											            }
											            else{
											            	return "La Sortimagasin  n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "La Sortimagasin  n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		public function executesortimagasin($matricule){

									
									$this->matricule=$matricule;
									$status="1";
					    			
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  sortimagasin Set status=:status WHERE matricule=:matricule";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":status", $status, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "La Sortimagasin   a ben été executé";


											            }
											            else{
											            	return "La Sortimagasin   n'a pas ete executé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'sortimagasin   n'a pas ete executé, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }
		public function validationsortimagasin($matricule,$validation){

									$this->validation=$validation;
									
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
					            	$this->matriculevalidation=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  sortimagasin Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule=:matricule";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
											 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
											 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "La Sortimagasin   a ben été validé";


											            }
											            else{
											            	return "La Sortimagasin   n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'sortimagasin   n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		

		
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from sortimagasin Where  matricule=:matricule  ";
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


	public function selectAllExecuter(){
    			

						            	  try{
											    $sql="SELECT sortimagasin.matricule, sortimagasin.libeller, sortimagasin.status, sortimagasin.date, module.nom AS modulenom, magasintable.nom AS magasinnom FROM sortimagasin JOIN module ON sortimagasin.matricule_module=module.matricule JOIN magasintable ON sortimagasin.matricule_magasin=magasintable.matricule WHERE sortimagasin.status='1'";
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
	public function selectAllNonExecuter(){
    			

						            	  try{
											    $sql="SELECT sortimagasin.matricule, sortimagasin.libeller, sortimagasin.status, sortimagasin.date, module.nom AS modulenom, magasintable.nom AS magasinnom FROM sortimagasin JOIN module ON sortimagasin.matricule_module=module.matricule JOIN magasintable ON sortimagasin.matricule_magasin=magasintable.matricule";
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
		public function selectAll(){
    			

						            	  try{
											    $sql="Select * from sortimagasin";
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
														    $sql="Delete from sortimagasin Where  matricule = :matricule  ";
														                	            	         include('../config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "La Sortimagasin  a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

// $objectCreated=new Sortimagasin();
// echo"execute";
// echo $objectCreated->ajouter(99,77,"libelle");
// echo $objectCreated->modifier("1",777,111,"edit libelle");
// echo $objectCreated->validationsortimagasin("1","1");


// print_r($objectCreated->selectmatricule("1"));
// echo $objectCreated->supprimer("1");

// print_r($objectCreated->selectAll());

	?>

