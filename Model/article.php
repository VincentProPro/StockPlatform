<?php

require("../authentification.php");
require("../db/config.php");

require("format.php");

// echo "after format";

class Article{

	private $matricule;
	private $code;
	private $groupcode;

	private $poids_kg;
	private $prixachat;
	private $prixvente;

	private $designation;
	private $format;
	private $benefice;
	private $description;

	private $code_category;
	private $quantity_per_unit;
	private $tmc;

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
		public function ajouter($designation,$prixachat,$prixvente,$code_category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc){
				$this->description=$description;
				$this->prixachat=$prixachat;
				$this->prixvente=$prixvente;
				$this->quantity_per_unit=$quantity_per_unit;
				$this->code_category=$code_category;
				$this->poids_kg=$poids_kg;
				$this->format=$format;
				$this->benefice=$benefice;
				$this->tmc=$tmc;
				$this->designation=$designation;
				// $this->code=$this->generatecode($designation);
				$this->groupcode=$this->generatecode($designation);//Convert all letterer to uppercase
				$objectCreated=new Format();
				// $objectCreated->selectmatricule($format)[0][2];
				$letteris=substr($objectCreated->selectmatricule($format)[0][2], 0,1);

				$this->code=$letteris.$this->groupcode;//Add firrst letter of format nom
				// $this->code="hv8p88";





		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	$this->dateachat=$datereel;
		            	// $redacteurcode="_SESSION";
		            	            	         include('../db/config.php');

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="insert into  article (code,groupcode,prixachat,prixvente,description,code_category,quantity_per_unit,poids_kg,format,benefice,tmc,designation,lastmodification,matriculredacteur) values ( :code,:groupcode, :prixachat,:prixvente,:description,:code_category,:quantity_per_unit,:poids_kg,:format,:benefice,:tmc,:designation,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                                                    $stmt->bindParam(":groupcode", $this->groupcode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":code", $this->code, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity_per_unit", $this->quantity_per_unit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":code_category", $this->code_category, PDO::PARAM_STR);
                                                    $stmt->bindParam(":poids_kg", $this->poids_kg, PDO::PARAM_STR);
                                                    $stmt->bindParam(":format", $this->format, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    $stmt->bindParam(":tmc", $tmc, PDO::PARAM_STR);
                                                    $stmt->bindParam(":designation", $designation, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                               	return "L'article a ben été enregistré";




		                        }
		                        else{
		                        	return "L'article n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "L'article  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


            public function modifier($matricule,$designation,$prixachat,$prixvente,$code_category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc){

									$this->description=$description;
									$this->prixachat=$prixachat;
									$this->prixvente=$prixvente;
									$this->quantity_per_unit=$quantity_per_unit;
									$this->code_category=$code_category;
									$this->poids_kg=$poids_kg;
									$this->format=$format;
									$this->benefice=$benefice;
									$this->tmc=$tmc;
									$this->designation=$designation;
									// $this->groupcode=$this->generatecode($designation);//Convert all letterer to uppercase

									// $this->code=""+$this->groupcode;//Add firrst letter of format nom
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  article Set code=:code,designation=:designation,description=:description, prixachat=:prixachat , prixvente=:prixvente ,code_category=:code_category,quantity_per_unit=:quantity_per_unit, poids_kg=:poids_kg,format=:format,benefice=:benefice,tmc=:tmc,lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

                                                   $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                                                    $stmt->bindParam(":code", $this->code, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity_per_unit", $this->quantity_per_unit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":code_category", $this->code_category, PDO::PARAM_STR);
                                                    $stmt->bindParam(":poids_kg", $this->poids_kg, PDO::PARAM_STR);
                                                    $stmt->bindParam(":format", $this->format, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    $stmt->bindParam(":tmc", $tmc, PDO::PARAM_STR);
                                                    $stmt->bindParam(":designation", $designation, PDO::PARAM_STR);

                                                    
			                      
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "L'article  a ben été modifié";


											            }
											            else{
											            	return "L'article  n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'article  n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		

		public function generatecode($designation){
                                  $codeisthis=$designation;
                                  $splitnom=explode(" ",$codeisthis);
                                  echo "Count :";
                                  echo count($splitnom);

                                  $numberofletternom=strlen($codeisthis);
                                  $numltersplitnom=count($splitnom);
                                  // $string[strlen($codeisthis)-1];
                                  $counterletter=0;
                                  $result='';


                                  switch ($numltersplitnom) {
                                    // case 0:
                                    //     echo "i equals 0";
                                    //     break;
                                                case 1:
                                                    echo "i equals 1 mot";
                                                              

                                                    for ( $i=0;  $i<strlen($splitnom[0]); $i++)
                                                    {
                                                      if ($i<4 ){
                                                                  $result.=$splitnom[0][$i]; 


                                                      }


                                                    }
                                                    break;
                                                case 2:
                                                    for ( $j=0;$j<2;$j++){
                                                      for ( $i=0; $i<strlen($splitnom[$j]);$i++){
                                                        if($i<2){
                                                                    $result.=$splitnom[$j][$i]; 


                                                        }



                                                    }


                                                    }

                                                    
                                                    break;
                                                case 3:
                                                    for ( $j=0;$j<3;$j++){
                                                      for ( $i=0;$i<strlen($splitnom[$j]);$i++){
                                                        if ($i<1 ){
                                                                    // $result.=substr($splitnom[$j], $i); 
                                                                    $result.=$splitnom[$j][$i]; 

                                                        }



                                                    }


                                                    }
                                                $result.=substr($splitnom[2], strlen($splitnom[2])-1); 
                                                break;

                                                default:
                                                    for ( $j=0;$j<4;$j++){
                                                      for ( $i=0; $i<strlen($splitnom[$j]);$i++){
                                                        if ($i<1 ){
                                                                    $result.=$splitnom[$j][$i]; 

                                                        }



                                                    }


                                                    }
                                                    break;
                                            }
                                $numberandom=rand(0,10)+rand(20,90);


                                  $result=strtoupper($result);
                                  $result.=$numberandom;
                                           include('../db/config.php');


                                  $sql = "SELECT * FROM article WHERE code = :code ";
                                                                           if($stmt = $pdo->prepare($sql)){
                                            // Bind variables to the prepared statement as parameters
                                            $stmt->bindParam(":code", $code, PDO::PARAM_STR);
                                            
                                            // Set parameters
                                            $code = $result;
                                            
                                            // Attempt to execute the prepared statement
                                            if($stmt->execute()){


                                                if($stmt->rowCount() == 0){
                                                  return $result;

                                                }
                                                else{
                                                  generatecode($codeisthis);
                                                }
                                              }}
  

                    }
		
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from article Where  matricule = :matricule  ";
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



		public function getmatricule($designation){
    							$this->designation=$designation;
    			

						            	  try{
											    $sql="Select matricule from article Where  designation=:designation";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":designation", $this->designation, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable[0][0];

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
												 return "La selection a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }

		public function getarticle($designation){
    							$this->designation=$designation;
    			

						            	  try{
											    $sql="Select * from article Where  designation=:designation";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":designation", $this->designation, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return $arraystable[0];

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
												 return "La selection a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }
		public function selectAll(){
    			

						            	  try{
											    $sql="Select * from article";
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
														    $sql="Delete from article Where  matricule = :matricule  ";
														                	            	         include('../db/config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "L'article   a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

// $objectCreated=new Article();
// echo"execute";
// $designation,$prixachat,$prixvente,$code_category,$quantity_per_unit,$description,$poids_kg,$format,$benefice,$tmc
// echo $objectCreated->ajouter("designation",888.0,9.9,"categorycode88",9,"description",9.9,"format",88.00,9.8);
// echo $objectCreated->modifier("42","designation42",888.0,9.9,99,99,"descri1 1 ption",9.9,"for1 1 mat",88.00,8.7);
// echo$objectCreated->getmatricule("Boite Antarene 500mg ");

// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("1");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

