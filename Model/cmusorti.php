<?php
require("../authentification.php");
require("../db/config.php");
// require("article.php");
// require("cmuentrer.php");

// echo"in cmuSorti file";
class Cmusorti{

	private $matricule;
	private $article_matricule;
	private $groupcode_article;
	private $taxe;
	private $prixachat;
	private $prixvente;
	private $numerofacture;
	private $quantity;
	private $situation_matricule;
	private $benefice;
	private $totalbenefice;
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

    	// public function callnotification($messageici, $locationpage){
					// 	echo"callnotification \n ";
					// 			echo "Message: ".$messageici." goto $locationpage";

					// 			// $messageObject=new Message($messageici, $locationpage);
				 //     //                           $messageObject->sendmessage();

					// 	}
public function reduce($matricule_article,$groupcode_article,$quantity,$dateexpiring,$matricule_lieu,$matricule_format){
	$sql="Select quantity, matricule from expiretb Where  dateexpiring=:dateexpiring  AND  groupcode_article=:groupcode_article AND matricule_format=:matricule_format AND matricule_lieu=:matricule_lieu";
	include('../db/config.php');


if($stmt = $pdo->prepare($sql)){
	$stmt->bindParam(":dateexpiring", $dateexpiring, PDO::PARAM_STR);
	$stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
	$stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
	$stmt->bindParam(":matricule_lieu", $matricule_lieu, PDO::PARAM_STR);

if($stmt->execute()){
if($stmt->rowCount()>0){
$arraystable= $stmt->fetchAll();
$previousqty=$arraystable[0][0];
$matricule=$arraystable[0][1];
if($previousqty>$quantity){
	$currentqty=$previousqty-$quantity;
	$sql="Update expiretb SET quantity=:quantity Where  matricule = :matricule  ";
																											 // include('../db/config.php');
	
	
																	if($stmt = $pdo->prepare($sql)){
																	  $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
																	  $stmt->bindParam(":quantity", $currentqty, PDO::PARAM_STR);
																  
																		if($stmt->execute()){
																																// echo"update in cmustcok";
																						return "L'article avec cette date d'expiration a bien été retiré";
	
																			// return "L'cmuentrer  a ben été enregistré";
	
																		}}



}else{
return "retrait impossible, stock insuffisant: ".$previousqty." || Besoin :".$quantity;

}

															    
//end
}
}
}

}
public function ajouter($article_desgnation,$quantity,$situation_matricule,$numerofacture,$dateexpiring){

				






		             try{
						echo" dateexpiring : ".$dateexpiring;

		         $this->numerofacture=$numerofacture;
				// include("article.php");
				// include("cmuentrer.php");
				$objetarticle=new Article();
				echo "article";
				$articledata=$objetarticle->getarticle($article_desgnation);
				$this->article_matricule=$articledata["matricule"];
				$this->groupcode_article=$articledata["groupcode"];

				// echo "article_matricule : $this->article_matricule";
				if($this->article_matricule=="none"){return "L'Article n'existe pas 😠😠!";}

				// $this->groupcode_article=$objetarticle->selectmatricule($this->article_matricule)[0][3];
				$objetcmuentrer=new Cmuentrer();
				$objetcmuentrer=$objetcmuentrer->selectgroupcode($this->groupcode_article);
				if($objetcmuentrer==="none"){return "Cet élément nexiste pas dans le stock";}

				echo "prix d'achat".$objetcmuentrer[0][9]."taxe is: ".$objetcmuentrer[0][10]."prix de vente : ".$objetcmuentrer[0][11]." objetcmuentrer: ".$objetcmuentrer;
				$this->prixachat=$objetcmuentrer[0][9];
				$this->taxe=$objetcmuentrer[0][10];
				$this->prixvente=$objetcmuentrer[0][11];
				$this->quantity=$quantity;
				$this->situation_matricule=$situation_matricule;
				$this->benefice=$this->prixvente-$this->prixachat;
				$this->totalbenefice=$this->benefice*$this->quantity;


				// echo"article_matricule : ".$this->article_matricule;
				// echo"article_desgnation : ".$article_desgnation;
				// echo"good".$objetcmuentrer[0][11];
						             	$sql="Select quantity,quantityreal from cmustock Where  matricule_article = :matricule_article  ";
															                	            	         include('../db/config.php');


															    if($stmt = $pdo->prepare($sql)){
															      $stmt->bindParam(":matricule_article", $this->article_matricule, PDO::PARAM_STR);
															  
															        if($stmt->execute()){
															        	 if($stmt->rowCount()>0){
															        	 	$arraystable= $stmt->fetchAll();
															        		$this->previousqty=$arraystable[0][0];
															        		$this->previousqtyreal=$arraystable[0][1];
															        		if($this->previousqty<$this->quantity){
															        			return "retrait impossible, stock insuffisant: ".$this->previousqty." || Besoin :".$this->quantity;

															        		}
															        		

															        	 }else{
															        	 	$this->previousqty=0;
															        	 	$this->previousqtyreal=0;
															        	 		return "retrait impossible, stock insuffisant: ".$this->previousqty." || Besoin :".$this->quantity;

															        	 }
															        	 $this->currentqty=$this->previousqty-$this->quantity;
															        	 $this->currentqtyreal=$this->previousqtyreal-$this->quantity;


															        	 $t=time();
						           		$datereel=date("Y-m-d H:i:s",$t);
						            	$redacteurcode=$_SESSION["email"];
						            	$this->date=$datereel;
						            	// $redacteurcode="_SESSION";

						            	            	         //get code from designation
						            	            	         //check if numcommand exist in achat entrer



						    	    $sql="insert into  cmusorti (article_matricule,prixachat,prixvente,previousqty,quantity,currentqty,numerofacture,situation_matricule,benefice,totalbenefice,date,taxe,lastmodification,matriculredacteur) values ( :article_matricule, :prixachat,:prixvente,:previousqty,:quantity,:currentqty,:numerofacture,:situation_matricule,:benefice,:totalbenefice,:date,:taxe,:lastmodification,:matriculredacteur)";
						             	 if($stmt = $pdo->prepare($sql)){
						             	 	


				                                                    $stmt->bindParam(":article_matricule", $this->article_matricule, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":numerofacture", $this->numerofacture, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":situation_matricule", $this->situation_matricule, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":currentqty", $this->currentqty, PDO::PARAM_STR);
																	 
																	$stmt->bindParam(":totalbenefice", $this->totalbenefice, PDO::PARAM_STR);
																	$stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":taxe", $this->taxe, PDO::PARAM_STR);

				                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":date", $datereel, PDO::PARAM_STR);


						                        if($stmt->execute()){
													$expiringtb=new ExpiringArticle();
													// remove article in expiring tb if necessary
													$messagenfo= $expiringtb->reduce($this->article_matricule,$this->groupcode_article,$this->quantity,$dateexpiring,1,3);

						                        	$sql="Select quantity from cmustock Where  matricule_article = :matricule_articleadded  ";


															    if($stmt = $pdo->prepare($sql)){
															      $stmt->bindParam(":matricule_articleadded", $this->article_matricule, PDO::PARAM_STR);
															  
															        if($stmt->execute()){
															        	 if($stmt->rowCount()>0){
															        	 	// $arraystable= $stmt->fetchAll();
															        		$sql="Update cmustock SET quantity=:quantity, quantityreal=:quantityreal  Where  matricule_article = :matricule_article  ";
															                	            	         // include('../db/config.php');


															    if($stmt = $pdo->prepare($sql)){
															      $stmt->bindParam(":matricule_article", $this->article_matricule, PDO::PARAM_STR);
															      $stmt->bindParam(":quantity", $this->currentqty, PDO::PARAM_STR);
															      $stmt->bindParam(":quantityreal", $this->currentqtyreal, PDO::PARAM_STR);
															  
															        if($stmt->execute()){
															        												    	// echo"update in cmustcok ";
													$messagenfo= $expiringtb->reduce($this->article_matricule,$this->groupcode_article,$this->quantity,$dateexpiring,1,3);
															        				return "Le retrait a ben été enregistré et le stock du CMU modifié.\n".$messagenfo;

															        	// return "L'cmuentrer  a ben été enregistré";

															        }}
															    }else{
															    	echo"insert in cmustcok";
															    	//insert
															    	include("article.php");
															    	 $article=new Article();
															    	$code_article=$article->selectmatricule($this->article_matricule)[0][1];
															    	// $code_article=$article->selectmatricule(2)[0][1];
															    	 $sql="insert into  cmustock (codearticle,matricule_article,quantity,quantityreal,prixachat,prixvente,benefice,date,lastmodification,matriculredacteur) values (:codearticle,:matricule_article,:quantity,:quantityreal,:prixachat,:prixvente,:benefice,:date,:lastmodification,:matriculredacteur)";
						             	 if($stmt = $pdo->prepare($sql)){
						             	 	


				                                                    $stmt->bindParam(":codearticle", $code_article, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":matricule_article", $this->article_matricule, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":quantityreal", $this->currentqtyreal, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":quantity", $this->currentqty, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

				                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
				                                                    $stmt->bindParam(":date", $datereel, PDO::PARAM_STR);


						                        if($stmt->execute()){
						                        	return "L'cmusorti  a ben été enregistré et le cmustock inserer";


						                        }}


															    }
														}}
						                               	




						                        }
						                        else{
						                        	return "L'cmusorti n'a pas ete ajouté, Requete Invalid veuillez retenter ";
						                             


						                        }
						                    }
						                     else{
						                        	return "L'cmusorti  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
						                             


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



    		



		public function validationCmuSorti($matricule,$validation){

									$this->validation=$validation;
									
									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
					            	$this->matriculevalidation=$_SESSION["matricule"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  cmusorti Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
											 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
											 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
			                      
			                      
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le cmusorti  a ben été validé";


											            }
											            else{
											            	return "Le cmusorti  n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le cmusorti  n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



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

		public function selectAllMois(){
    			

						            	  try{
											    $sql="SELECT cmusorti.matricule, cmusorti.article_matricule, article.designation, cmusorti.quantity, cmusorti.benefice, cmusorti.totalbenefice, cmusorti.date FROM cmusorti JOIN article ON cmusorti.article_matricule=article.matricule  WHERE  MONTH(cmusorti.date) = MONTH(now()) and YEAR(cmusorti.date) = YEAR(now())";
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
		public function selectAllThreeMois(){
    			

			try{
				  $sql="SELECT cmusorti.matricule, cmusorti.article_matricule, article.designation, cmusorti.quantity, cmusorti.benefice, cmusorti.totalbenefice, cmusorti.date FROM cmusorti JOIN article ON cmusorti.article_matricule=article.matricule  WHERE cmusorti.date > now() - INTERVAL 3 MONTH";
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
public function selectAllSixMois(){
    			

	try{
		  $sql="SELECT cmusorti.matricule, cmusorti.article_matricule, article.designation, cmusorti.quantity, cmusorti.benefice, cmusorti.totalbenefice, cmusorti.date FROM cmusorti JOIN article ON cmusorti.article_matricule=article.matricule  WHERE cmusorti.date > now() - INTERVAL 6 MONTH;";
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

		public function selectAllPeriodeSorti($debutperiode,$finperiode){
			// echo '<script> alert("essa") </script>';
			// $debutperiode='2023-01-13';
			// $finperiode='2023-05-12';
			$debutperiode=$debutperiode;
			$finperiode=$finperiode;
    			

			try{
				  $sql="SELECT cmusorti.matricule, cmusorti.article_matricule, article.designation, cmusorti.quantity, cmusorti.benefice, cmusorti.totalbenefice, cmusorti.date FROM cmusorti JOIN article ON cmusorti.article_matricule=article.matricule  WHERE cmusorti.date BETWEEN :date1 AND :date2";
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
public function selectAllYear(){
    			

	try{
		  $sql="SELECT cmusorti.matricule, cmusorti.article_matricule, article.designation, cmusorti.quantity, cmusorti.benefice, cmusorti.totalbenefice, cmusorti.date FROM cmusorti JOIN article ON cmusorti.article_matricule=article.matricule  WHERE cmusorti.date > now() - INTERVAL 1 YEAR;";
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
		// // public function supprimer($matricule){
		// 	    							$this->matricule=$matricule;
			    			

		// 							            	  try{
		// 												    $sql="Delete from cmusorti Where  matricule = :matricule  ";
		// 												                	            	         include('../db/config.php');


		// 												    if($stmt = $pdo->prepare($sql)){
		// 												      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
		// 												        if($stmt->execute()){
		// 												        	return " a ben été supprimé";
														          

		// 												        }
														  
		// 												    }

		// 												  }
		// 												catch(exception $e){
		// 													 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

		// 												  }
		// 					        }


	
}

// $objectCreated=new Cmusorti();
// echo"execute";
// $article_matricule,$prixachat,$prixvente,$quantity,$sortimagasin_matricule,$situation_matricule,$benefice,$numerofacture,$taxe// 
// echo $objectCreated->ajouter("Boite Dafalgan 500mg",1,1,1);
// echo $objectCreated->modifier("2","code1article",888.0,9.9,99,99,"descri1 1 ption",9.9,"for1 1 mat",88.00,"numcomand","numfacture");
// echo $objectCreated->validationCmuSorti("1","1");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("2");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

