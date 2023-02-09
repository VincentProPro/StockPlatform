<?php
require("../authentification.php");
require("../config.php");
// require("../AutreClass/message.php");

class Fourniseur{

	private $nom;
	private $matricule;
	private $matriculredacteur;
	private $email;
	private $tel;
	private $location;
	private $plusinfo;
	private $reference;
	function __construct(){}


				// public function setparamedit($matricule,$nom,$email,$tel,$plusinfo,$role,$status){
				// 	$this->matricule=$matricule;
				// 	$this->nom=$nom;
				// 	$this->email=$email;
				// 	$this->tel=$tel;
				// 	$this->plusinfo=$plusinfo;
				// 	$this->location=$location;
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

				// public function callnotification($messageici, $locationpage){
				// 		echo"callnotification \n ";
				// 				echo "Message: ".$messageici." goto $locationpage";

				// 				// $messageObject=new Message($messageici, $locationpage);
				//      //                           $messageObject->sendmessage();

				// 		}
    			public function ajouter($nom,$email,$tel,$plusinfo,$location){
				    	// $this->matricule=$matricule;
						$this->nom=$nom;
						$this->email=$email;
						$this->tel=$tel;
						$this->plusinfo=$plusinfo;
						$this->location=$location;
						$this->reference=$this->generatecode($nom);


						try{

													$t=time();
			           		$datereel=date("Y-m-d H:i:s",$t);
			            	$redacteurcode=$_SESSION["email"];
			            	// $redacteurcode="_SESSION";
			            	            	         include('../config.php');

			            	            	            $sql="insert into fournisseurdb(nom,tel,email,plusinfo,location,reference,matriculredacteur,lastmodification) values (:nom,:tel,:email,:plusinfo,:location,:reference,:matriculredacteur,:lastmodification)";
			             	 if($stmt = $pdo->prepare($sql)){
			                      $stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
			                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
			                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
			                      $stmt->bindParam(":plusinfo", $this->plusinfo, PDO::PARAM_STR);
			                      $stmt->bindParam(":location", $this->location, PDO::PARAM_STR);
			                      $stmt->bindParam(":reference", $this->reference, PDO::PARAM_STR);
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);


			                        if($stmt->execute()){


			                        	return "Le fournisseur a bien ete ajouté ";

			                               



			                        }
			                        else{
			                        	 return "Le fournisseur n'a pas ete ajouté, Requete Invalid veuillez retenter ";
			                        	


			                        }
			                    }else{
			                    		return "Le fournisseur n'a pas ete ajouté, Requete Invalid Execution Fail veuillez retenter ";


			                    }


												}catch(exception $e){

												 return "Le fournisseur n'a pas ete ajouté, Requete Invalid veuillez retenter Error:".$e;

												}
    		


			     
           				}


            	public function modifier($matricule,$nom,$email,$tel,$plusinfo,$location){

									$this->nom=$nom;
									$this->email=$email;
									$this->tel=$tel;
									$this->plusinfo=$plusinfo;
									$this->location=$location;
									$this->reference=$this->generatecode($nom);

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  fournisseurdb Set nom=:nom, tel=:tel , plusinfo=:plusinfo , email=:email , location=:location, reference=:reference  WHERE matricule = :matricule";
	    	            	         	   include('../config.php');

				                        if($stmt = $pdo->prepare($sql)){

											$stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
											$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

											$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
											$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
											$stmt->bindParam(":plusinfo", $this->plusinfo, PDO::PARAM_STR);
											$stmt->bindParam(":location", $this->location, PDO::PARAM_STR);
											$stmt->bindParam(":reference", $this->reference, PDO::PARAM_STR);

											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le fournisseur a ben été modifié";


											            }
											            else{
											            	return "Le fournisseur n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le fournisseur n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }



				public function generatecode($nom){
                                  $codeisthis=$nom;
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
                                           include('../config.php');


                                  $sql = "SELECT * FROM fournisseurdb WHERE reference = :reference ";
                                                                           if($stmt = $pdo->prepare($sql)){
                                                                           	// Set parameters
                                            $code = $result;
                                            // Bind variables to the prepared statement as parameters
                                            $stmt->bindParam(":reference", $code, PDO::PARAM_STR);
                                            
                                            
                                            
                                            // Attempt to execute the prepared statement
                                            if($stmt->execute()){


                                                if($stmt->rowCount() == 0){
                                                	// echo "result is".$result;
                                                  return $result;

                                                }
                                                else{
                                                  generatecode($codeisthis);
                                                }
                                              }}else{
                                              	generatecode($codeisthis);

                                              }
  

                    }
				public function getmatricule($reference){
    							$this->reference=$reference;
    			

						            	  try{
											    $sql="Select matricule from fournisseurdb Where  reference = :reference  ";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":reference", $this->reference, PDO::PARAM_STR);
											  
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

				public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from fournisseurdb Where  matricule = :matricule  ";
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
											    $sql="Select * from fournisseurdb";
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
											    $sql="Delete from users Where  matricule = :matricule  ";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	return "Le fournisseurdb a ben été supprimé";
											          

											        }
											  
											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }
		

	
}
// echo"execute";
// $objectCreated=new Fourniseur();
// echo$objectCreated->ajouter("vincent ajout","email@gmail.com","3+224334333","medecin chirugien plusinfo","Adlocationmin");
// echo $objectCreated->modifier("1","vincent modify","email@gmail.com","3+224334333","medecin chirugien plusinfo","Adlocationmin");
// echo $objectCreated->supprimer("1");
// print_r($objectCreated->selectmatricule("2"));
// print_r($objectCreated->selectAll());



	?>

