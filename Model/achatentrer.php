<?php
require("../authentification.php");
require("../config.php");

class AchatEntrer{

		private $matricule;
	private $magasin;
	private $reference;
	private $fournicode;
	private $libeller;
	private $tarif;


	private $matriculevalidation;
	private $tempsvalidation;

	private $matriculredacteur;
	private $numcomand;
	private $numfacture;
	private $validation;

	private $date;
	private $heure;
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
		public function ajouter($magasin,$reference,$libeller,$tarif,$fournicode,$numcomand,$numfacture){
				$this->reference=$reference;
				$this->magasin=$magasin;
				$this->libeller=$libeller;
				$this->tarif=$tarif;
				$this->fournicode=$fournicode;
				$this->numcomand=$numcomand;
				$this->numfacture=$numfacture;





		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	date_default_timezone_set('Africa/Porto-Novo');
						$current_time = date('h:i:s');
						// date("Y-m-d H:i:s",$t);
						$current_date = date('Y-m-d');
						$this->date=$current_date;
						$this->heure=$current_time;


		            	// $redacteurcode="_SESSION";
		            	            	         include('../config.php');

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="insert into  achatentrer (magasin,reference,fournicode,libeller,tarif,matricule_comand,numfacture,date,heure,lastmodification,matriculredacteur) values ( :magasin, :reference,:fournicode,:libeller,:tarif,:matricule_comand,:numfacture,:date,:heure,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    $stmt->bindParam(":fournicode", $this->fournicode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":reference", $this->reference, PDO::PARAM_STR);
                                                    $stmt->bindParam(":libeller", $this->libeller, PDO::PARAM_STR);
                                                    $stmt->bindParam(":tarif", $this->tarif, PDO::PARAM_STR);
                                                    $stmt->bindParam(":magasin", $this->magasin, PDO::PARAM_STR);
                                                    $stmt->bindParam(":date", $this->date, PDO::PARAM_STR);
                                                    $stmt->bindParam(":heure", $this->heure, PDO::PARAM_STR);

                                                    $stmt->bindParam(":matricule_comand", $this->numcomand, PDO::PARAM_STR);
                                                    $stmt->bindParam(":numfacture", $this->numfacture, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                               	return "L'achat  a ben été enregistré";




		                        }
		                        else{
		                        	return "L'achat n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "L'achat  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


            public function modifier($matricule,$magasin,$reference,$libeller,$tarif,$fournicode,$numcomand,$numfacture){

									$this->reference=$reference;
									$this->magasin=$magasin;
									$this->libeller=$libeller;
									$this->tarif=$tarif;
									$this->fournicode=$fournicode;
									$this->numcomand=$numcomand;
									$this->numfacture=$numfacture;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  achatentrer Set magasin=:magasin, reference=:reference , libeller=:libeller ,tarif=:tarif,fournicode=:fournicode, numcomand=:numcomand,numfacture=:numfacture,lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

                                                    $stmt->bindParam(":fournicode", $this->fournicode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":reference", $this->reference, PDO::PARAM_STR);
                                                    $stmt->bindParam(":libeller", $this->libeller, PDO::PARAM_STR);
                                                    $stmt->bindParam(":tarif", $this->tarif, PDO::PARAM_STR);
                                                    $stmt->bindParam(":magasin", $this->magasin, PDO::PARAM_STR);
                                                    $stmt->bindParam(":numcomand", $numcomand, PDO::PARAM_STR);
                                                    $stmt->bindParam(":numfacture", $numfacture, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "L'achat  a ben été modifié";


											            }
											            else{
											            	return "L'achat  n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'achat  n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		public function validationAchatEntrer($matricule,$validation){

									$this->validation=$validation;
									
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
					            	$this->matriculevalidation=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  achatentrer Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule = :matricule";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
											 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
											 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "L'achat   a ben été validé";


											            }
											            else{
											            	return "L'achat   n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'achat   n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		

		
	public function selectAllNonValider(){
    			

						            	  try{
											    $sql="SELECT achaten.matricule, achaten.libeller, achaten.reference, fourni.nom, besoin.libeller,  achaten.date, achaten.numfacture  FROM achatentrer achaten, fournisseurdb fourni, bondecommandedb besoin where achaten.fournicode=fourni.matricule AND besoin.matricule=achaten.matricule_comand AND achaten.validation=0";
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
	public function selectAllValider(){
    			

						            	  try{
											    $sql="SELECT achaten.matricule, achaten.libeller, achaten.tarif, fourni.nom, besoin.libeller, achaten.date, achaten.numfacture FROM achatentrer achaten, fournisseurdb fourni, bondecommandedb besoin where achaten.fournicode=fourni.matricule AND besoin.matricule=achaten.matricule_comand AND achaten.validation=1";
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
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from achatentrer Where  matricule = :matricule  ";
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
											    $sql="Select * from achatentrer";
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
														    $sql="Delete from achatentrer Where  matricule = :matricule  ";
														                	            	         include('../config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "L'achat  a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

// $objectCreated=new AchatEntrer();
// echo"execute";
// echo $objectCreated->ajouter(6,"reference","libeller","tarif",8,99,"numfacture");
// echo $objectCreated->modifier("1","magasin1","reference1","libeller1","88.0","fournicode","numcomand","numfacture");
// echo $objectCreated->validationAchatEntrer("1","1");


// print_r($objectCreated->selectmatricule("1"));
// echo $objectCreated->supprimer("1");

// print_r($objectCreated->selectAll());

	?>

