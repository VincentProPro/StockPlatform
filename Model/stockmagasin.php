<?php
echo"in stcok";

require("../authentification.php");
require("../config.php");
echo"in stcok";

class Stockmagasin{

	private $matricule;
	private $matricule_article;
	private $poids;
	private $magazincode;
	private $matricule_magazin;
	private $quantity;

	private $quantityperunit;
	private $matricule_format;
	private $groupcode_article;
	
	private $timestamp;
	private $lastmodification;

	function __construct(){}
	
	public function ajouter($matricule_article,$groupcode_article,$matricule_magazin,$magazincode,$quantity,$quantityperunit,$poids,$matricule_format){
				$this->matricule_article=$matricule_article;
				$this->groupcode_article=$groupcode_article;
				$this->matricule_magazin=$matricule_magazin;
				$this->quantityperunit=$quantityperunit;
				$this->quantity=$quantity;
				$this->poids=$poids;
				$this->matricule_format=$matricule_format;
				$this->magazincode=$magazincode;
				







		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	$this->dateachat=$datereel;
		            	// $redacteurcode="_SESSION";
		            	            	         include('../config.php');

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="Select * from stockmagasin Where groupcode_article=:groupcode_article AND matricule_format=:matricule_format AND matricule_magazin=:matricule_magazin AND quantityperunit=:quantityperunit ";


											    if($stmt = $pdo->prepare($sql)){
											    	echo"prepare";

											      // $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	echo"execute";

											        	 if($stmt->rowCount()>0){
											        	 	echo"update";
											        	 	//update
											        	 	echo $this->modifier($matricule_article,$groupcode_article,$matricule_magazin,$quantity,$quantityperunit,$matricule_format);

											        	 }else{
											        	 	echo"add";

											        	 	//add
											        	 	$sql="insert into  stockmagasin (matricule_article,groupcode_article,quantity,quantityperunit,poids,matricule_format,matricule_magazin,magazincode,lastmodification,matriculredacteur) values ( :matricule_article,:groupcode_article,:quantity,:quantityperunit,:poids,:matricule_format,:matricule_magazin,:magazincode,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                                                    $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);

                                                    $stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                               	echo "Stock magasin a ben été enregistré";




		                        }
		                        else{
		                        	return "Stock magasin n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "Stockmagasin  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
											        	 }
											        	
											          

											        }
											        else{
											        	 return "La selection a échoué, veuillez retenter.";
											        }
											  
											    }else{
											    	 return "La selection a échoué, veuillez retenter. ";

											    }
		    	    
		                }catch (Exception $e) {
		                	return "Stock Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


            public function modifier($matricule_article,$groupcode_article,$matricule_magazin,$quantity,$quantityperunit,$matricule_format){
            	echo "in modifier ";

									$this->matricule_article=$matricule_article;
									$this->groupcode_article=$groupcode_article;
									$this->matricule_magazin=$matricule_magazin;
									$this->quantityperunit=$quantityperunit;
									$this->quantity=$quantity;
									$this->matricule_format=$matricule_format;
					    			
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  stockmagasin Set quantity=:quantity Where  groupcode_article=:groupcode_article AND matricule_format=:matricule_format AND matricule_magazin=:matricule_magazin AND quantityperunit=:quantityperunit";
	    	            	         	   include('../config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											$stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
											// $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
											            											          											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){
											            	echo "in execute good";



											            	echo "Le stock a bien été modifié";


											            }
											            else{
											            	return "Le stock n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le stock n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		
		
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  matricule = :matricule  ";
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
		public function disponibility($groupcode_article,$magazincode){
											
    							
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  groupcode_article=:groupcode_article And magazincode=:magazincode";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											  

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
		public function checkdisponibility($groupcode_article,$magazincode){
											
    							
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  groupcode_article=:groupcode_article And magazincode=:magazincode ";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      // $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											  

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
		public function selectfrom($matricule_article,$quantityperunit,$matricule_format,$magazincode){
    							
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  matricule_article=:matricule_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit ";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  

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

		public function selectinstock($matricule_article,$quantityperunit,$matricule_format,$magazincode){
    							// $this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  matricule_article=:matricule_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit  ";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											       $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        		return 1;

											        	 }else{
											        	 	return 0;
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

		public function selectQty($matricule_article,$quantityperunit,$matricule_format,$magazincode){
    							// $this->matricule=$matricule_article;
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  matricule_article=:matricule_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	// $arraystable=new array[];
											        	 	$qty= $stmt->fetchAll();
											        		return $qty[0][3];

											        	 }else{
											        	 	return 0;
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
		public function selectQtytwo($groupcode_article,$quantityperunit,$matricule_format,$magazincode){
    							// $this->matricule=$matricule_article;
			echo "in selectQtytwo";
    			

						            	  try{
											    $sql="Select * from stockmagasin Where  groupcode_article=:groupcode_article  And matricule_format=:matricule_format And magazincode=:magazincode And quantityperunit=:quantityperunit";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	// $arraystable=new array[];
											        	 	$qty= $stmt->fetchAll();
											        		return $qty[0][3];

											        	 }else{
											        	 	return 0;
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
											    $sql="SELECT stockmagasin.matricule, stockmagasin.matricule_article, stockmagasin.groupcode_article, article.designation, stockmagasin.quantity, stockmagasin.quantityperunit, format.nom AS formatnom, magasintable.nom AS magazinnom FROM stockmagasin JOIN article ON stockmagasin.matricule_article=article.matricule JOIN format ON stockmagasin.matricule_format=format.matricule JOIN magasintable ON stockmagasin.magazincode=magasintable.code ORDER BY stockmagasin.quantity ASC";
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
														    $sql="Delete from stockmagasin Where  matricule = :matricule  ";
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

