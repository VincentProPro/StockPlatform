<?php
echo"in stcok";

require("../authentification.php");
require("../config.php");
echo"in stcok";

class CmuStock{

	private $matricule;
	private $matricule_article;
	private $quantity;
	private $currentqty;


	private $quantityreal;
	private $groupcode_article;
	private $prixachat;
	private $prixvente;
	private $benefice;	
	private $timestamp;
	private $lastmodification;

	function __construct(){}
	
	public function ajouter($matricule_article,$groupcode_article,$prixachat,$prixvente,$benefice,$quantity,$currentqty){
				$this->matricule_article=$matricule_article;
				$this->groupcode_article=$groupcode_article;
				$this->prixachat=$prixachat;
				$this->prixvente=$prixvente;
				$this->quantity=$quantity;
				$this->benefice=$benefice;
				$this->currentqty=$currentqty;
				
				







		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	// $this->dateachat=$datereel;
		            	// $redacteurcode="_SESSION";
		            	            	         include('../config.php');
		            	            	         $sql="Select quantity,quantityreal from cmustock Where  matricule_article=:matricule_articleadded  or groupcode_article=:groupcode_article";


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule_articleadded", $this->matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        	 	$this->quantityreal=$arraystable[0][1]+$this->quantity;
											        	 	$this->currentqty=$arraystable[0][0]+$this->quantity;

											        		$sql="Update cmustock SET quantity=:quantity, quantityreal=:quantityreal  Where  matricule_article=:matricule_article  ";
											                	            	         // include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":quantity", $this->currentqty, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityreal", $this->quantityreal, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        												    	// echo"update in cmustcok";
											        				return "L'cmuentrer  a ben été enregistré et le cmustock modifié";

											        	// return "L'cmuentrer  a ben été enregistré";

											        }}
											    }else{
											    	echo"insert in cmustcok";
											    	//insert
											    	// include("article.php");
											    	//  $article=new Article();
											    	// $groupcode_article=$article->selectmatricule($this->matricule_article)[0][1];
											    	// $code_article=$article->selectmatricule(2)[0][1];
											    	 $sql="insert into  cmustock (groupcode_article,matricule_article,quantity,quantityreal,prixachat,prixvente,benefice,date,lastmodification,matriculredacteur) values (:groupcode_article,:matricule_article,:quantity,:quantityreal,:prixachat,:prixvente,:benefice,:date,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){
		             	 	


                                                    $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantityreal", $this->currentqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->currentqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":date", $datereel, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                        	return "L'cmuentrer  a ben été enregistré et le cmustock inserer";


		                        }}


											    }
										}}

		            	   
		    	    
		                }catch (Exception $e) {
		                	return "Stock Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


        //     public function modifier($matricule_article,$groupcode_article,$matricule_magazin,$quantity,$quantityperunit,$matricule_format){

								// 	$this->matricule_article=$matricule_article;
								// 	$this->groupcode_article=$groupcode_article;
								// 	$this->matricule_magazin=$matricule_magazin;
								// 	$this->quantityperunit=$quantityperunit;
								// 	$this->quantity=$quantity;
								// 	$this->matricule_format=$matricule_format;
					    			
	    	            	        

	    	  //           	         try{

	    	  //           	         	   $sql="Update  stockmagasin Set quantity=:quantity Where  groupcode_article=:groupcode_article AND matricule_format=:matricule_format AND matricule_magazin=:matricule_magazin AND quantityperunit=:quantityperunit";
	    	  //           	         	   include('../config.php');
	    	  //           	         		// echo"this->fullname: ".$this->fullname;

				    //                     if($stmt = $pdo->prepare($sql)){

								// 			$stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
								// 			// $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
								// 			      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
								// 			      $stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
								// 			      $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
								// 			      $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
											            
											          
											           
											            
								// 			            // Attempt to execute the prepared statement
								// 			            if($stmt->execute()){

								// 			            	return "Le stock  a ben été modifié";


								// 			            }
								// 			            else{
								// 			            	return "Le stock n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


								// 			            }}

	    	  //           	         }
	    	  //           	         catch(Exception $e){
	    	  //           	         		return "Le stock n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	  //           	         }






		     
							 // }

		
		
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from cmustock Where  matricule=:matricule  ";
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
		// public function disponibility($groupcode_article,$quantityperunit,$quantity,$magazincode){
											
    							
    			

		// 				            	  try{
		// 									    $sql="Select * from cmustock Where  groupcode_article=:groupcode_article And magazincode=:magazincode";
		// 									                	            	         include('../config.php');


		// 									    if($stmt = $pdo->prepare($sql)){
		// 									      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											  

		// 									        if($stmt->execute()){
		// 									        	 if($stmt->rowCount()>0){
		// 									        	 	$arraystable= $stmt->fetchAll();
											        	 	
		// 									        		return $arraystable;

		// 									        	 }else{
		// 									        	 	return "none";
		// 									        	 }
											        	
											          

		// 									        }
		// 									        else{
		// 									        	 return "La selection a échoué, veuillez retenter.";
		// 									        }
											  
		// 									    }else{
		// 									    	 return "La selection a échoué, veuillez retenter. ";

		// 									    }

		// 									  }
		// 									catch(exception $e){
		// 										 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

		// 									  }
		// 					        }
		// public function checkdisponibility($groupcode_article,$quantityperunit,$quantity,$magazincode,$matricule_format){
											
    							
    			

		// 				            	  try{
		// 									    $sql="Select * from stockmagasin Where  groupcode_article=:groupcode_article And magazincode=:magazincode And matricule_format!=:matricule_format";
		// 									                	            	         include('../config.php');


		// 									    if($stmt = $pdo->prepare($sql)){
		// 									      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											  

		// 									        if($stmt->execute()){
		// 									        	 if($stmt->rowCount()>0){
		// 									        	 	$arraystable= $stmt->fetchAll();
											        	 	
		// 									        		return $arraystable;

		// 									        	 }else{
		// 									        	 	return "none";
		// 									        	 }
											        	
											          

		// 									        }
		// 									        else{
		// 									        	 return "La selection a échoué, veuillez retenter.";
		// 									        }
											  
		// 									    }else{
		// 									    	 return "La selection a échoué, veuillez retenter. ";

		// 									    }

		// 									  }
		// 									catch(exception $e){
		// 										 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

		// 									  }
		// 					        }
		// public function selectfrom($matricule_article,$quantityperunit,$matricule_format,$magazincode){
    							
    			

		// 				            	  try{
		// 									    $sql="Select * from stockmagasin Where  matricule_article=:matricule_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit ";
		// 									                	            	         include('../config.php');


		// 									    if($stmt = $pdo->prepare($sql)){
		// 									      $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  

		// 									        if($stmt->execute()){
		// 									        	 if($stmt->rowCount()>0){
		// 									        	 	$arraystable= $stmt->fetchAll();
		// 									        		return $arraystable;

		// 									        	 }else{
		// 									        	 	return "none";
		// 									        	 }
											        	
											          

		// 									        }
		// 									        else{
		// 									        	 return "La selection a échoué, veuillez retenter.";
		// 									        }
											  
		// 									    }else{
		// 									    	 return "La selection a échoué, veuillez retenter. ";

		// 									    }

		// 									  }
		// 									catch(exception $e){
		// 										 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

		// 									  }
		// 					        }

		// public function selectinstock($matricule_article,$quantityperunit,$matricule_format,$magazincode){
  //   							// $this->matricule=$matricule;
    			

		// 				            	  try{
		// 									    $sql="Select * from stockmagasin Where  matricule_article=:matricule_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit  ";
		// 									                	            	         include('../config.php');


		// 									    if($stmt = $pdo->prepare($sql)){
		// 									       $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  
											  
		// 									        if($stmt->execute()){
		// 									        	 if($stmt->rowCount()>0){
		// 									        	 	$arraystable= $stmt->fetchAll();
		// 									        		return 1;

		// 									        	 }else{
		// 									        	 	return 0;
		// 									        	 }
											        	
											          

		// 									        }
		// 									        else{
		// 									        	 return "La selection a échoué, veuillez retenter.";
		// 									        }
											  
		// 									    }else{
		// 									    	 return "La selection a échoué, veuillez retenter. ";

		// 									    }

		// 									  }
		// 									catch(exception $e){
		// 										 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

		// 									  }
		// 					        }

		// public function selectQty($matricule_article,$quantityperunit,$matricule_format,$magazincode){
  //   							// $this->matricule=$matricule_article;
    			

		// 				            	  try{
		// 									    $sql="Select * from stockmagasin Where  matricule_article=:matricule_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit";
		// 									                	            	         include('../config.php');


		// 									    if($stmt = $pdo->prepare($sql)){
		// 									      $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  
		// 									        if($stmt->execute()){
		// 									        	 if($stmt->rowCount()>0){
		// 									        	 	// $arraystable=new array[];
		// 									        	 	$qty= $stmt->fetchAll();
		// 									        		return $qty[0][3];

		// 									        	 }else{
		// 									        	 	return 0;
		// 									        	 }
											        	
											          

		// 									        }
		// 									        else{
		// 									        	 return "La selection a échoué, veuillez retenter.";
		// 									        }
											  
		// 									    }else{
		// 									    	 return "La selection a échoué, veuillez retenter. ";

		// 									    }

		// 									  }
		// 									catch(exception $e){
		// 										 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

		// 									  }
		// 					        }
		// public function selectQtytwo($groupcode_article,$quantityperunit,$matricule_format,$magazincode){
  //   							// $this->matricule=$matricule_article;
		// 	echo "in selectQtytwo";
    			

		// 				            	  try{
		// 									    $sql="Select * from stockmagasin Where  groupcode_article=:groupcode_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit";
		// 									                	            	         include('../config.php');


		// 									    if($stmt = $pdo->prepare($sql)){
		// 									      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
		// 									      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  
		// 									        if($stmt->execute()){
		// 									        	 if($stmt->rowCount()>0){
		// 									        	 	// $arraystable=new array[];
		// 									        	 	$qty= $stmt->fetchAll();
		// 									        		return $qty[0][3];

		// 									        	 }else{
		// 									        	 	return 0;
		// 									        	 }
											        	
											          

		// 									        }
		// 									        else{
		// 									        	 return "La selection a échoué, veuillez retenter.";
		// 									        }
											  
		// 									    }else{
		// 									    	 return "La selection a échoué, veuillez retenter. ";

		// 									    }

		// 									  }
		// 									catch(exception $e){
		// 										 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

		// 									  }
		// 					        }


		public function selectAll(){
    			

						            	  try{
											    $sql="SELECT cmustock.matricule, cmustock.groupcode_article,cmustock.quantity, cmustock.prixachat, cmustock.prixvente, article.designation FROM cmustock JOIN article ON cmustock.matricule_article=article.matricule";
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
														    $sql="Delete from cmustock Where  matricule=:matricule  ";
														                	            	         include('../config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "L Stockmagasin  a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

// $objectCreated=new Stockmagasin();
// echo"execute";
// $codearticle,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$format,$benefice,$numcomand,$numfacture
// echo $objectCreated->ajouter(17,"SPSFN",1,"MGS01",87,5,8,2);
// echo $objectCreated->modifier(17,"SPSFN",1,90,5,2);
// echo $objectCreated->validationAchatCoursier("1","1");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("2");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

