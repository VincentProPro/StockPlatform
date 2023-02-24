<?php
require("../authentification.php");
require("../db/config.php");


class Cmuentrer{

	private $matricule;
	private $article_matricule;
	private $groupcode_article;
	private $sortimagasin_matricule;
	private $prixachat;
	private $prixvente;
	private $taxe;
	private $quantity;

	private $quantityperunit;
	private $situation_matricule;
	private $benefice;
	private $previousqty;
	private $previousqtyreal;
	private $currentqtyreal;
	private $currentqty;
	private $date;
	private $matriculevalidation;
	private $tempsvalidation;

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

    
		public function ajouter($article_matricule,$groupcode_article,$prixachat,$prixvente,$quantity,$quantityperunit,$sortimagasin_matricule,$situation_matricule,$benefice,$taxe){
				$this->prixachat=$prixachat;
				$this->prixvente=$prixvente;
				$this->quantityperunit=$quantityperunit;
				$this->quantity=$quantity;
				$this->sortimagasin_matricule=$sortimagasin_matricule;
				$this->situation_matricule=$situation_matricule;
				$this->benefice=$benefice;
				$this->groupcode_article=$groupcode_article;
				$this->taxe=$taxe;
				$this->article_matricule=$article_matricule;
				// echo"good";





		             try{
		             	$sql="Select quantity,quantityreal from cmustock Where  matricule_article = :matricule_article  or groupcode_article=:groupcode_article";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule_article", $this->article_matricule, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		$this->previousqty=$arraystable[0][0];
											        		$this->previousqtyreal=$arraystable[0][1];
											        		

											        	 }else{
											        	 	$this->previousqty=0;
											        	 	$this->previousqtyreal=0;
											        	 }
											        	 $this->currentqty=$this->previousqty+$this->quantity;
											        	 $this->currentqtyreal=$this->previousqtyreal+$this->quantity;


											        	 $t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	$this->date=$datereel;
		            	// $redacteurcode="_SESSION";

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="insert into  cmuentrer (article_matricule,groupcode_article,prixachat,prixvente,sortimagasin_matricule,previousqty,quantity,currentqty,quantityperunit,taxe,situation_matricule,benefice,date,lastmodification,matriculredacteur) values ( :article_matricule, :groupcode_article, :prixachat,:prixvente,:sortimagasin_matricule,:previousqty,:quantity,:currentqty,:quantityperunit,:taxe,:situation_matricule,:benefice,:date,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){
		             	 	


                                                    $stmt->bindParam(":sortimagasin_matricule", $this->sortimagasin_matricule, PDO::PARAM_STR);
                                                    $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":article_matricule", $this->article_matricule, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                                                    $stmt->bindParam(":taxe", $this->taxe, PDO::PARAM_STR);
                                                    $stmt->bindParam(":situation_matricule", $this->situation_matricule, PDO::PARAM_STR);
                                                    $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":currentqty", $this->currentqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":date", $datereel, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                        	$cmustock=new CmuStock();

		                        							return $cmustock->ajouter($this->article_matricule,$this->groupcode_article,$this->prixachat,$this->prixvente,$this->benefice,$this->quantity,$this->currentqty);

		                        	// return "L'cmuentrer a ete ajouté";
		                        	
		                        	
		                               	




		                        }
		                        else{
		                        	return "L'cmuentrer n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "L'cmuentrer  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
											        	
											          

											        }
											        else{
											        	 return "La selection a échoué, veuillez retenter.";
											        }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
		             		// $this->matriculredacteur=$matriculredacteur;
		    			
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }

		 public function validationcmu($matricule,$validation){

		 							

		                        	$this->validation=$validation;
									
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
					            	$this->matriculevalidation=$_SESSION["matricule"];
					            	//check if valider else dont excute
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  cmuentrer Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
											 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
											 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){
											            	echo"in execute CmuStock";


											            	$cmustock=new CmuStock();
											            	$arraycmusotck=$this->selectmatricule($this->matricule);
		                        							return $cmustock->ajouter($arraycmusotck[0][2],$arraycmusotck[0][3],$arraycmusotck[0][9],$arraycmusotck[0][11],$arraycmusotck[0][12],$$arraycmusotck[0][7],$arraycmusotck[0][8]);



											            }
											            else{
											            	return "L'cmuentrer  n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "L'cmuentrer  n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }


		 }



    		


					    //  public function modifier($matricule,$article_matricule,$prixachat,$prixvente,$quantity,$quantityperunit,$sortimagasin_matricule,$situation_matricule,$benefice,$taxe){

																			
															// 					$this->matricule=$matricule;
															// 	    			$t=time();
															// 	           		$datereel=date("Y-m-d H:i:s",$t);
															// 	            	$redacteurcode=$_SESSION["matricule"];
															// 	            	$this->prixachat=$prixachat;
															// $this->prixvente=$prixvente;
															// $this->quantityperunit=$quantityperunit;
															// $this->quantity=$quantity;
															// $this->sortimagasin_matricule=$sortimagasin_matricule;
															// $this->situation_matricule=$situation_matricule;
															// $this->benefice=$benefice;
															// $this->taxe=$taxe;
															// $this->article_matricule=$article_matricule;
															// $qtyadded=0;
															// $matricule_articleadded=0;





													  //            try{
													  //            	$sql="Select quantity ,matricule_article from cmuentrer Where  matricule = :matricule  ";
															// 							                	            	         include('../db/config.php');


															// 							    if($stmt = $pdo->prepare($sql)){
															// 							      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
																						  
															// 							        if($stmt->execute()){
															// 							        	 if($stmt->rowCount()>0){
															// 							        	 	$arraystable= $stmt->fetchAll();
															// 							        		$qtyadded=$arraystable[0][0];
															// 							        		$matricule_articleadded=$arraystable[0][01;


															// 							        	 }}}
													  //            	$sql="Select quantity from cmustock Where  matricule_article = :matricule_articleadded  ";
															// 							                	            	         include('../db/config.php');


															// 							    if($stmt = $pdo->prepare($sql)){
															// 							      $stmt->bindParam(":matricule_articleadded", $matricule_articleadded, PDO::PARAM_STR);
																						  
															// 							        if($stmt->execute()){
															// 							        	 if($stmt->rowCount()>0){
															// 							        	 	$arraystable= $stmt->fetchAll();
															// 							        		$this->previousqty=$arraystable[0][0];
															// 							        		$sql="Update quantity=:quantity from cmustock Where  matricule_article = :matricule_article  ";
															// 							                	            	         include('../db/config.php');


															// 							    if($stmt = $pdo->prepare($sql)){
															// 							    	$currentqtybefore=$previousqty-$qtyadded;
															// 							      $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
															// 							      $stmt->bindParam(":quantity", $currentqtybefore, PDO::PARAM_STR);
																						  
															// 							        if($stmt->execute()){
															// 							        	 $sql="Update  cmuentrer Set article_matricule=:article_matricule, prixachat=:prixachat , prixvente=:prixvente ,sortimagasin_matricule=:sortimagasin_matricule,quantity=:quantity,quantityperunit=:quantityperunit, taxe=:taxe,situation_matricule=:situation_matricule,benefice=:benefice,lastmodification=:lastmodification  WHERE matricule = :matricule";

													  //            	  if($stmt = $pdo->prepare($sql)){


											    //                                                 $stmt->bindParam(":sortimagasin_matricule", $this->sortimagasin_matricule, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":article_matricule", $this->article_matricule, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":taxe", $this->taxe, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":situation_matricule", $this->situation_matricule, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

											    //                                                 $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":matricule", $redacteurcode, PDO::PARAM_STR);


													  //                       if($stmt->execute()){
													  //                              	return "L'cmuentrer  a ben été enregistré";




													  //                       }
													  //                       else{
													  //                       	return "L'cmuentrer n'a pas ete ajouté, Requete Invalid veuillez retenter ";
													                             


													  //                       }
													  //                   }
													  //                    else{
													  //                       	return "L'cmuentrer  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
													                             


													  //                       }

																						        	 
															// 							        	 }}
																						        		

															// 							        	 }else{
															// 							        	 	return "previousqty==0";
															// 							        	 }

																					
													             	 
																						        	
																						          

															// 							        }
															// 							        else{
															// 							        	 return "La selection a échoué, veuillez retenter.";
															// 							        }
																						  
															// 							    }else{
															// 							    	 return "La selection a échoué, veuillez retenter. ";

															// 							    }
													  //            		// $this->matriculredacteur=$matriculredacteur;
													    			
													  //               }catch (Exception $e) {
													  //               	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

															// }


															// //end
												    	            	        

												   //  	            	         try{

												   //  	            	         	   $sql="Update  cmuentrer Set description=:description, prixachat=:prixachat , prixvente=:prixvente ,quantity=:quantity,quantityperunit=:quantityperunit, poids=:poids,situation_matricule=:situation_matricule,benefice=:benefice,lastmodification=:lastmodification  WHERE matricule = :matricule";
												   //  	            	         	   include('../db/config.php');
												   //  	            	         		// echo"this->fullname: ".$this->fullname;

															//                         if($stmt = $pdo->prepare($sql)){

															// 							$stmt->bindParam(":article_matricule", $this->article_matricule, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":format", $this->format, PDO::PARAM_STR);
											    //                                                 $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

											                                                    
														                      
														 //                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
														 //                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
																						            
																						          
																						           
																						            
															// 							            // Attempt to execute the prepared statement
															// 							            if($stmt->execute()){

															// 							            	return "L'achat coursier  a ben été modifié";


															// 							            }
															// 							            else{
															// 							            	return "L'achat coursier  n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


															// 							            }}

												   //  	            	         }
												   //  	            	         catch(Exception $e){
												   //  	            	         		return "L'achat coursier  n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



												   //  	            	         }






													     
															// 			 }

		// public function validationCmuEntrer($matricule,$validation){

		// 							$this->validation=$validation;
									
		// 							$this->matricule=$matricule;
		// 			    			$t=time();
		// 			           		$datereel=date("Y-m-d H:i:s",$t);
		// 			            	$redacteurcode=$_SESSION["email"];
		// 			            	$this->matriculevalidation=$_SESSION["matricule"];
	    	            	        

	 //    	            	         try{

	 //    	            	         	   $sql="Update  cmuentrer Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule = :matricule";
	 //    	            	         	   include('../db/config.php');
	 //    	            	         		// echo"this->fullname: ".$this->fullname;

		// 		                        if($stmt = $pdo->prepare($sql)){

		// 									 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
		// 									 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
		// 									 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
		// 	                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
		// 									            // Attempt to execute the prepared statement
		// 									            if($stmt->execute()){

		// 									            	return "Le cmuentrer  a ben été validé";


		// 									            }
		// 									            else{
		// 									            	return "Le cmuentrer  n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


		// 									            }}

	 //    	            	         }
	 //    	            	         catch(Exception $e){
	 //    	            	         		return "Le cmuentrer  n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



	 //    	            	         }






		     
		// 					 }

		
                                        

		
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from cmuentrer Where  matricule=:matricule  ";
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
		public function selectgroupcode($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql = "SELECT * FROM cmuentrer  WHERE groupcode_article=:groupcode_article ORDER BY date DESC";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":groupcode_article", $this->matricule, PDO::PARAM_STR);
											  
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
												 return "La selection a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }


		public function selectAll(){
    			

						            	  try{
											    $sql="Select * from cmuentrer";
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

		public function selectAllPeriode($debutperiode,$finperiode){
    			

						            	  try{
											    $sql="SELECT cmuentrer.matricule, cmuentrer.article_matricule, article.designation, cmuentrer.quantity, cmuentrer.benefice FROM cmuentrer JOIN article ON cmuentrer.article_matricule=article.matricule  WHERE cmuentrer.date BETWEEN :date1 AND :date2";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											    	$stmt->bindParam(":date1", $debutperiode, PDO::PARAM_STR);
                                             		$stmt->bindParam(":date2", $finperiode, PDO::PARAM_STR);
											  
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
		// // public function supprimer($matricule){
		// 	    							$this->matricule=$matricule;
			    			

		// 							            	  try{
		// 												    $sql="Delete from achatcoursier Where  matricule = :matricule  ";
		// 												                	            	         include('../db/config.php');


		// 												    if($stmt = $pdo->prepare($sql)){
		// 												      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
		// 												        if($stmt->execute()){
		// 												        	return "L'achat coursier  a ben été supprimé";
														          

		// 												        }
														  
		// 												    }

		// 												  }
		// 												catch(exception $e){
		// 													 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

		// 												  }
		// 					        }


	
}

// $objectCreated=new Cmuentrer();
// echo"execute";
// $codearticle,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$format,$benefice,$numcomand,$numfacture
// echo $objectCreated->ajouter(3,77.9,99.8,77,8,88,66,777,24);
// echo $objectCreated->modifier("2","code1article",888.0,9.9,99,99,"descri1 1 ption",9.9,"for1 1 mat",88.00,"numcomand","numfacture");
// echo $objectCreated->validationCmuEntrer("1","1");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("2");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

