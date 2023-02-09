<?php
require("authentification.php");
require("config.php");
require("AutreClass/message.php");
require("Model/membre.php");
// require("configdb.php");

echo"hellolast";

class DbClass{

	
	function __construct(){
		

	}
	// function __construct($matricule,$fullname,$email,$tel,$position,$role,$status){
	

	// }

	// function setparam($newDb){
	// 	$this->newDb=$newDb;
		

	// }

	private function sendmessge($mssg,$locatepage){
		$messageObject=new Message($mssg, $locatepage);

		$messageObject->sendmessage();
		

	}


	


    // 	public function ajoutermembre($fullname,$tel,$email,$position,$role,$status){
    		


		  //            try{
		  //            		// $this->matriculredacteur=$matriculredacteur;
		  //   			$t=time();
		  //          		$datereel=date("Y-m-d H:i:s",$t);
		  //           	$redacteurcode=$_SESSION["email"];
		  //           	// $redacteurcode="_SESSION";
		  //           	            	         include('config.php');



		  //   	   $sql="insert into users(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
		  //            	 if($stmt = $pdo->prepare($sql)){
		  //                     $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
		  //                     $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
		  //                       if($stmt->execute()){
		  //                              $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
		  //                              $messageObject->sendmessage();



		  //                       }
		  //                       else{
		  //                       	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
		  //                              $messageObject->sendmessage();


		  //                       }
		  //                   }
		  //               }catch (Exception $e) {
		  //               	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
		  //                              $messageObject->sendmessage();
				// }
           

    //         }

       // public function modifiermembre($matricule,$fullname,$tel,$email,$position,$role,$status)){
		    	// 		$t=time();
		     //       		$datereel=date("Y-m-d H:i:s",$t);
					  //           	$redacteurcode=$_SESSION["email"];
					  //           	            	            	         include('config.php');
					  //           	            	            	         $objectMembre=new Membre();
					  //           	            	            	         $objectMembre->setparamedit($matricule,$fullname,$tel,$email,$position,$role,$status);


					  //           	  $sql="Update  users Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

					  //                       if($stmt = $pdo->prepare($sql)){

							// 			$stmt->bindParam(":fullname", $objectMembre->getfullname(), PDO::PARAM_STR);
							// 			$stmt->bindParam(":matricule", $objectMembre->getmatricule(), PDO::PARAM_STR);

							// 			$stmt->bindParam(":tel", $objectMembre->gettel(), PDO::PARAM_STR);
							// 			$stmt->bindParam(":email", $objectMembre->getemail(), PDO::PARAM_STR);
							// 			$stmt->bindParam(":position", $objectMembre->getposition(), PDO::PARAM_STR);
							// 			$stmt->bindParam(":role", $objectMembre->getrole(), PDO::PARAM_STR);
							// 			$stmt->bindParam(":status", $objectMembre->getstatus(), PDO::PARAM_STR);

										            
										          
										           
										            
							// 			            // Attempt to execute the prepared statement
							// 			            if($stmt->execute()){
							// 			            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
			    //                            				$messageObject->sendmessage();


							// 			            }
							// 			            else{
							// 			            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
			    //                            $messageObject->sendmessage();

							// 			            }}
							// 			        }

	// public function supprimermembre($matricule){
			    			

	// 								            	  try{
	// 								    $sql="Delete from users Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	// public function ajouterbesoin($libeller,$description,$tarif,$magasin){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	    $sql="insert into  bondecommandedb (libeller,tarif,magazincode,description,lastmodification,redacteurcode) values ( :libeller, :tarif,:magazincode,:description,:lastmodification,:redacteurcode)";
	// 	             	 if($stmt = $pdo->prepare($sql)){


 //                                                    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":libeller", $libeller, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":tarif", $tarif, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":magazincode", $magasin, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":redacteurcode", $redacteurcode, PDO::PARAM_STR);

	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "welcomsurveillante.php");
	// 	                               $messageObject->sendmessage();
	// 	                        	echo "good";



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "welcomsurveillante.php");
	// 	                               $messageObject->sendmessage();

	// 	                        	echo"bad1";


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "welcomsurveillante.php");
	// 	                               $messageObject->sendmessage();

	// 	                	// echo"bad error catch".$e;
	// 			}
           

 //            }



       // public function modifierbesoin($code,$libeller,$description,$tarif,$magasin){
		    	// 		$t=time();
		     //       		$datereel=date("Y-m-d H:i:s",$t);
					  //           	$redacteurcode=$_SESSION["email"];
					  //           	            	            	         include('config.php');


					  //           	  $sql="Update bondecommandedb Set libeller=:libeller, tarif=:tarif , magazincode=:magazincode , description=:description , lastmodification=:lastmodification, redacteurcode=:redacteurcode  WHERE code = :code";

					  //                       if($stmt = $pdo->prepare($sql)){

							// 			 $stmt->bindParam(":description", $description, PDO::PARAM_STR);
       //                                              $stmt->bindParam(":code", $code, PDO::PARAM_STR);
       //                                              $stmt->bindParam(":libeller", $libeller, PDO::PARAM_STR);
       //                                              $stmt->bindParam(":tarif", $tarif, PDO::PARAM_STR);
       //                                              $stmt->bindParam(":magazincode", $magasin, PDO::PARAM_STR);
       //                                              $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
       //                                              $stmt->bindParam(":redacteurcode", $redacteurcode, PDO::PARAM_STR);


										            
										          
										           
										            
							// 			            // Attempt to execute the prepared statement
							// 			            if($stmt->execute()){
							// 			            	 $messageObject=new Message("Le besoin a ben été modifié", "welcomsurveillante.php");
			    //                            				$messageObject->sendmessage();


							// 			            }
							// 			            else{
							// 			            	$messageObject=new Message("Le besoin n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "welcomsurveillante.php");
			    //                            $messageObject->sendmessage();

							// 			            }}
							// 			        }

	// public function supprimerbesoin($code){
			    			

	// 								            	  try{
	// 								    $sql="Delete from bondecommandedb Where  code = :code  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":code", $code, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le besoin a ben été supprimé", "welcomsurveillante.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "welcomsurveillante.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	// public function ajouterachatcoursier(){

	// 					if(selectcodearticle($designation)=="none"){
	// 						return "error"

	// 					}else{
	// 						if(checkexistachatentrer($comandnum, $facturnum)=="true"){

	// 							try{

 //                                                                        $sql="insert into  achatcoursier (codearticle,poids,prixachat,quantity,quantityperunit,format,description,numcomand,numfacture,matriculredacteur,dateachat,lastmodification) values ( :codearticle,:poids,:prixachat,:quantity,:quantityperunit,:format, :description,:numcomand,:numfacture,:matriculredacteur,:dateachat,:lastmodification)";

 //                                              if($stmt = $pdo->prepare($sql)){


 //                                                    $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":poids", $poids, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":prixachat", $prixachat, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":quantity", $quantite, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":format", $format, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":numcomand", $comandnum, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":numfacture", $facturnum, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":dateachat", $dateentrer, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":description", $description, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);

                                  
          
           
            
 //                                                          // Attempt to execute the prepared statement
 //                                                          if($stmt->execute()){
 //                                                            $sql = "SELECT * FROM achatcoursier WHERE code = :codeis";
                                                      
 //                                                                  if($stmt = $pdo->prepare($sql)){
 //                                                                      // Bind variables to the prepared statement as parameters
 //                                                                      $stmt->bindParam(":codeis", $codeis, PDO::PARAM_STR);
            
 //                                                                              // Set parameters
 //                                                                              //$idSession = trim($_POST["idSession"]);
                                                                              
 //                                                                              // Attempt to execute the prepared statement
 //                                                                              if($stmt->execute()){
 //                                                                                  // Check if username exists, if yes then verify password
 //                                                                                  if($stmt->rowCount() >0){
 //                                                                                        echo "<script>alert('Loperation a reussie !');</script>";
 //                                                                                        sendmessge("Loperation a reussie !","coursier/welcomecoursier.php");




 //                                                                                  }
 //                                                                                  else{
 //                                                                                        // echo "<script>alert('Loperation a échoué veuillez retenter!');</script>";
                                                                                        
	// 		                               					sendmessge("Loperation a échoué veuillez retenter!","coursier/welcomecoursier.php");

 //                                                                                  }

 //                                                                                }else{
 //                                                                                        echo "<script>alert('Loperation a échoué veuillez retenter!');</script>";
 //                                                                                        sendmessge("Loperation a échoué veuillez retenter!","coursier/welcomecoursier.php");

 //                                                                                }
 //                                                                              }


 //                                                          }}
 //                                                                      }

 //                                                                       catch(exception $e){
 //                                                  // echo"try again".$e;
 //                                                   sendmessge("Loperation a échoué veuillez retenter! Error: ".$e,"coursier/welcomecoursier.php");

                                                  

 //                                        }
	// 						}else{
	// 							return "error";
	// 							sendmessge("Loperation a échoué veuillez retenter!","coursier/welcomecoursier.php");
	// 						}
	// 					}
    		


		             
           

 //            }

 //       public function modifierachatcoursier($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  users Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimerachatcoursier($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from users Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}




	// public function ajouterarticle(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into article(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifierarticle($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  article Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimerarticle($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from article Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function selectcodearticle($designation){

	// 	$sql = "SELECT code FROM article WHERE designation = :designation";
                                                                
 //                                                                // Set parameters
 //                                                                // $param_username = trim($_POST["email"]);
                                                            
 //                                                            if($stmt = $pdo->prepare($sql)){
 //                                                                         $stmt->bindParam(":designation", $designation, PDO::PARAM_STR);

 //                                                                          $designation = trim($_POST["autocomplete-search"]);;

                                                                
 //                                                                if($stmt->execute()){
                                                                                            
 //                                                                    if($stmt->rowCount()>0){
 //                                                                              $codearticlearray= $stmt->fetchAll();
 //                                                                              $codearticle=$codearticlearray[0][0];

 //                                                                              return $codearticle;

 //                                                                            }else{return "none";}

 //                                                                     }else{return "none";}}
	// }


	// public function checkexistachatentrer($comandnum,$facturnum){
	// 			$sql = "SELECT * FROM achatentrer WHERE numfacture = :numfacture and numcomand=:numcomand";
                                                                
 //                                                                // Set parameters
 //                                                                // $param_username = trim($_POST["email"]);
                                                            
 //                                                            if($stmt = $pdo->prepare($sql)){
 //                                                                         $stmt->bindParam(":numcomand", $comandnum, PDO::PARAM_STR);
 //                                                                         $stmt->bindParam(":numfacture", $facturnum, PDO::PARAM_STR);


                                                                
 //                                                                if($stmt->execute()){
                                                                                            
 //                                                                    if($stmt->rowCount()>0){
 //                                                                    	return "true";

 //                                                                    }else{
 //                                                                    	return "false";
 //                                                                    }}}else{
 //                                                                     	return "error";


 //                                                                    }
	// }
	
	// public function ajouterachatentrer(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into achatentrer(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifierachatentrer($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  achatentrer Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimerachatentrer($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from achatentrer Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}


// cmuentrer
// cmusorti
// cmustock
// format
// fournisseurdb
// inventairetable
// magasintable
// module
// situation
// sortidetailmagasin
// sortimagasin
// stocktable
// usersloginfo

	// public function ajoutercmuentrer(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into cmuentrer(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercmuentrer($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  cmuentrer Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercmuentrer($code){
			    			

	// 								            	  try{
	// 								    $sql="Delete from cmuentrer Where  code = :code  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":code", $code, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	// public function ajoutercmusorti(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercmusorti($code){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercmusorti($code){
			    			

	// 								            	  try{
	// 								    $sql="Delete from cmusorti Where  code = :code  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":code", $code, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	// public function ajoutercmustock(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into cmustock(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercmustock($code){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  cmustock Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercmustock($code){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from cmustock Where  code = :code  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":code", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	// public function ajouterformat(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into format(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifierformat($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  format Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimerformat($matricule){
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	


	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}

	// public function ajoutercategoritable(){
    		


	// 	             try{
	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('config.php');



	// 	    	   $sql="insert into categoritable(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
	// 	             	 if($stmt = $pdo->prepare($sql)){
	// 	                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	// 	                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 	                        if($stmt->execute()){
	// 	                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
	// 	                               $messageObject->sendmessage();



	// 	                        }
	// 	                        else{
	// 	                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
	// 	                               $messageObject->sendmessage();


	// 	                        }
	// 	                    }
	// 	                }catch (Exception $e) {
	// 	                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
	// 	                               $messageObject->sendmessage();
	// 			}
           

 //            }

 //       public function modifiercategoritable($matricule){
	// 	    			$this->matricule=$matricule;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["email"];
	// 				            	            	            	         include('config.php');


	// 				            	  $sql="Update  categoritable Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

	// 				                        if($stmt = $pdo->prepare($sql)){

	// 									$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
	// 									$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

	// 									$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
	// 									$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
	// 									$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
	// 									$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
	// 									$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

										            
										          
										           
										            
	// 									            // Attempt to execute the prepared statement
	// 									            if($stmt->execute()){
	// 									            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
	// 		                               				$messageObject->sendmessage();


	// 									            }
	// 									            else{
	// 									            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
	// 		                               $messageObject->sendmessage();

	// 									            }}
	// 									        }

	// public function supprimercategoritable($matricule){
	// 		    			$this->matricule=$matricule;
			    			

	// 								            	  try{
	// 								    $sql="Delete from categoritable Where  matricule = :matricule  ";
	// 								                	            	         include('config.php');


	// 								    if($stmt = $pdo->prepare($sql)){
	// 								      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
									  
	// 								        if($stmt->execute()){
	// 								           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								        }
									  
	// 								    }

	// 								  }catch(exception $e){
	// 								     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
	// 		                               				$messageObject->sendmessage();

	// 								  }
	// 	}



	
}

$newobject=new DbClass();
echo"couocou last";

$newobject->ajouterbesoin("libeller","designation8","45666","magasin");

	?>