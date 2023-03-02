<?php
require("../authentification.php");
require("../db/config.php");
// require("article.php");

require("entrermagasin.php");


class AchatCoursier{

	private $matricule;
	private $matricule_article;
	private $poids;
	private $prixachat;
	private $prixvente;
	private $quantity;

	private $quantityperunit;
	private $matricule_format;
	private $benefice;
	private $description;

	private $dateachat;
	private $matricule_comand;
	private $numfacture;
	private $validation;

	private $matriculredacteur;
	private $timestamp;
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
		public function ajouter($designation,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$matricule_format,$benefice,$matricule_comand,$numfacture){


								 echo"in achatCoursier try";

				$this->description=$description;
				$this->prixachat=$prixachat;
				$this->prixvente=$prixvente;
				$this->quantityperunit=$quantityperunit;
				$this->quantity=$quantity;
				$this->poids=$poids;
				$this->matricule_format=$matricule_format;
				$this->benefice=$benefice;
				$this->matricule_comand=$matricule_comand;
				$this->numfacture=$numfacture;

								 // echo"before include article";
				// include('article.php');
				 echo"in achatCoursier try";
				$article=new Article();

				
				$this->matricule_article=$article->getmatricule($designation);







		             try{
		             // echo"in achatCoursier try";

		             		// $this->matriculredacteur=$matriculredacteur;
		             	date_default_timezone_set('Africa/Porto-Novo');

		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	$this->dateachat=$datereel;
		            	// $redacteurcode="_SESSION";
		            	            	         include('../db/config.php');

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="insert into  achatcoursier (matricule_article,prixachat,prixvente,description,quantity,quantityperunit,poids,matricule_format,benefice,matricule_comand,numfacture,dateachat,lastmodification,matriculredacteur) values ( :matricule_article, :prixachat,:prixvente,:description,:quantity,:quantityperunit,:poids,:matricule_format,:benefice,:matricule_comand,:numfacture,:dateachat,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                                                    $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    $stmt->bindParam(":matricule_comand", $this->matricule_comand, PDO::PARAM_STR);
                                                    $stmt->bindParam(":numfacture", $numfacture, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":dateachat", $datereel, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                               	return "L'achat coursier a ben été enregistré";




		                        }
		                        else{
		                        	return "L'achat coursier n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "L'achat coursier  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


            public function modifier($matricule,$codearticle,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$matricule_format,$benefice,$matricule_comand,$numfacture){

									$this->description=$description;
									$this->prixachat=$prixachat;
									$this->prixvente=$prixvente;
									$this->quantityperunit=$quantityperunit;
									$this->quantity=$quantity;
									$this->poids=$poids;
									$this->matricule_format=$matricule_format;
									$this->benefice=$benefice;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  achatcoursier Set description=:description, prixachat=:prixachat , prixvente=:prixvente ,quantity=:quantity,quantityperunit=:quantityperunit, poids=:poids,matricule_format=:matricule_format,benefice=:benefice,lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											$stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    
			                      
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "L'achat coursier  a ben été modifié";


											            }
											            else{
											            	return "L'achat coursier  n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'achat coursier  n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		public function validationAchatCoursier($matricule,$validation){

									$this->validation=$validation;
									
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
					            	$this->matriculevalidation=$_SESSION["matricule"];
					            	//check if valider else dont excute
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  achatcoursier Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
											 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
											 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){
											            	echo"in execute";
											            	$achatcoursier=$this->selectmatricule($matricule);
																// print_r($achatcoursier);
											            	$objectCreated1=new EntrerMagasin();
																// ajouter($matricule_article,$prixachat,$prixvente,$quantity,$quantityperunit,$poids,$matricule_format,$benefice,$matricule_comand);
															

											            	// return "L'achat coursier  a ben été validé";
											            	return $objectCreated1->ajouter($achatcoursier[0][1],$achatcoursier[0][3],$achatcoursier[0][4],$achatcoursier[0][5],$achatcoursier[0][6],$achatcoursier[0][2],$achatcoursier[0][7],$achatcoursier[0][8],$achatcoursier[0][11]);


											            }
											            else{
											            	return "L'achat coursier  n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'achat coursier  n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		

		
	public function selectAllNonValider(){
    			

						            	  try{
											    $sql="SELECT achatcour.matricule, art.designation, achatcour.quantity, achatcour.quantityperunit, achatcour.prixachat, besoin.libeller, achatcour.numfacture,achatcour.description,achatcour.dateachat, form.nom FROM achatcoursier achatcour, article art, format form, bondecommandedb besoin where form.matricule=achatcour.matricule_format AND art.matricule=achatcour.matricule_article AND besoin.matricule=achatcour.matricule_comand AND achatcour.validation=0";
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
											    $sql="SELECT achatcour.matricule, art.designation, achatcour.quantity, achatcour.quantityperunit, achatcour.prixachat, besoin.libeller, achatcour.numfacture,achatcour.description, achatcour.dateachat,form.nom FROM achatcoursier achatcour, article art, format form, bondecommandedb besoin where form.matricule=achatcour.matricule_format AND art.matricule=achatcour.matricule_article AND besoin.matricule=achatcour.matricule_comand AND achatcour.validation=1";
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
	public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from achatcoursier Where  matricule = :matricule  ";
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
											    $sql="Select * from achatcoursier";
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
														    $sql="Delete from achatcoursier Where  matricule = :matricule  ";
														                	            	         include('../db/config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "L'achat coursier  a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

// $objectCreated=new AchatCoursier();
// echo"execute";
// $codearticle,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$format,$benefice,$numcomand,$numfacture
// echo $objectCreated->ajouter("Boite Spasfon 500mg",888.0,9.9,99,99,"description",9.9,2,88.00,39,"vincent555");
// echo $objectCreated->modifier("2","code1article",888.0,9.9,99,99,"descri1 1 ption",9.9,"for1 1 mat",88.00,"numcomand","numfacture");
// echo $objectCreated->validationAchatCoursier("93","1");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("2");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

