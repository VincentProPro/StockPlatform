<?php
require("../authentification.php");
require("../config.php");

require("besoin.php");
echo"good";

require("magasin.php");
echo"good1";

require("stockmagasin.php");
echo"good2";

echo"entrermagasin before article";

require("article.php");
echo"after article";

class EntrerMagasin{

	private $matricule;
	private $matricule_article;
	private $poids;
	private $magazincode;
	private $matricule_magazin;
	private $quantity;
	private $previousqty;
	private $currentqty;

	private $quantityperunit;
	private $matricule_format;
	private $groupcode_article;
	private $prixachat;
	private $prixvente;
	private $benefice;
	
	private $timestamp;
	private $lastmodification;

	function __construct(){}
	
	public function ajouter($matricule_article,$prixachat,$prixvente,$quantity,$quantityperunit,$poids,$matricule_format,$benefice,$matricule_comand){
		echo"in EntrerMagasin";

				$this->matricule_article=$matricule_article;
				// $this->groupcode_article=$groupcode_article;
				// $this->matricule_magazin=$matricule_magazin;
				$this->quantityperunit=$quantityperunit;
				$this->quantity=$quantity;
				$this->poids=$poids;
				$this->prixachat=$prixachat;
				$this->prixvente=$prixvente;
				$this->benefice=$benefice;
				$this->matricule_format=$matricule_format;
				// $this->magazincode=$magazincode;

				// include('article.php');
				// echo"after include article";

				// include('besoin.php');
				// include('magasin.php');

				// include('stockmagasin.php');
				// echo"after include";


				$article=new Article();
				$commande=new Commande();
				$magasin=new Magasin();
				$stockmagasin=new Stockmagasin();
				echo"select selectQty";
				

				$this->magazincode=$commande->selectmatricule($matricule_comand)[0][4];
				$this->previousqty=$stockmagasin->selectQty($this->matricule_article,$this->quantityperunit,$this->matricule_format,$this->magazincode);
				$this->currentqty=$this->quantity+$this->previousqty;
								echo"select commande->selectmatricule(";
												echo"select magasin->selectmagazincode(";
				$this->matricule_magazin=$magasin->selectmagazincode($this->magazincode)[0][0];

				echo"select article->selectmatricule(";

				$this->groupcode_article=$article->selectmatricule($matricule_article)[0][3];







		             try{
		             	echo"previousqty :".$this->previousqty." ;";

		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	$this->dateachat=$datereel;
		            	// $redacteurcode="_SESSION";
		            	            	         include('../config.php');

		            	            	         //get code from designation
		            	            	         //check if numcommand exist in achat entrer



		    	    $sql="insert into  entrermagasin (matricule_article,prixachat,prixvente,groupcode_article,quantity,quantityperunit,previousqty,currentqty,poids,matricule_format,benefice,matricule_magazin,magazincode,lastmodification,matriculredacteur) values ( :matricule_article, :prixachat,:prixvente,:groupcode_article,:quantity,:quantityperunit,:previousqty,:currentqty,:poids,:matricule_format,:benefice,:matricule_magazin,:magazincode,:lastmodification,:matriculredacteur)";
		             	 if($stmt = $pdo->prepare($sql)){


                                                    $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
                                                    $stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                                                    $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":currentqty", $this->currentqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                        	// echo "L'Entrer Magasin a ben été enregistré";
		                        	return $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magazin,$this->magazincode,$this->currentqty,$this->quantityperunit,$this->poids,$this->matricule_format);






		                        }
		                        else{
		                        	return "L'Entrer Magasin n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "L'Entrer Magasin  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }
	// public function ajouterdeux($matricule_article,$prixachat,$prixvente,$quantity,$quantityperunit,$poids,$matricule_format,$benefice,$matricule_comand,$previousqty,$currentqty,$magazincode,$matricule_magazin,$groupcode_article){
	// 	echo"in EntrerMagasin";

	// 			$this->matricule_article=$matricule_article;
	// 			$this->groupcode_article=$groupcode_article;
	// 			$this->matricule_magazin=$matricule_magazin;
	// 			$this->quantityperunit=$quantityperunit;
	// 			$this->quantity=$quantity;
	// 			$this->poids=$poids;
	// 			$this->prixachat=$prixachat;
	// 			$this->prixvente=$prixvente;
	// 			$this->benefice=$benefice;
	// 			$this->matricule_format=$matricule_format;
	// 			$this->magazincode=$magazincode

	// 			$this->previousqty=$previousqty;
	// 			$this->currentqty=$currentqty;

	// 			$this->groupcode_article=$article->selectmatricule($matricule_article)[0][3];







	// 	             try{
	// 	             	echo"previousqty :".$this->previousqty." ;";

	// 	             		// $this->matriculredacteur=$matriculredacteur;
	// 	    			$t=time();
	// 	           		$datereel=date("Y-m-d H:i:s",$t);
	// 	            	$redacteurcode=$_SESSION["email"];
	// 	            	$this->dateachat=$datereel;
	// 	            	// $redacteurcode="_SESSION";
	// 	            	            	         include('../config.php');

	// 	            	            	         //get code from designation
	// 	            	            	         //check if numcommand exist in achat entrer



	// 	    	    $sql="insert into  entrermagasin (matricule_article,prixachat,prixvente,groupcode_article,quantity,quantityperunit,previousqty,currentqty,poids,matricule_format,benefice,matricule_magazin,magazincode,lastmodification,matriculredacteur) values ( :matricule_article, :prixachat,:prixvente,:groupcode_article,:quantity,:quantityperunit,:previousqty,:currentqty,:poids,:matricule_format,:benefice,:matricule_magazin,:magazincode,:lastmodification,:matriculredacteur)";
	// 	             	 if($stmt = $pdo->prepare($sql)){


 //                                                    $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

 //                                                    $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":currentqty", $this->currentqty, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


	// 	                        if($stmt->execute()){
	// 	                        	// echo "L'Entrer Magasin a ben été enregistré";
	// 	                        	return $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magazin,$this->magazincode,$this->currentqty,$this->quantityperunit,$this->poids,$this->matricule_format);






	// 	                        }
	// 	                        else{
	// 	                        	return "L'Entrer Magasin n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


	// 	                        }
	// 	                    }
	// 	                     else{
	// 	                        	return "L'Entrer Magasin  n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


	// 	                        }
	// 	                }catch (Exception $e) {
	// 	                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

	// 			}
           

 //           			 }


    		


 //            public function modifier($matricule,$matricule_article,$prixachat,$prixvente,$quantity,$quantityperunit,$poids,$matricule_format,$benefice,$matricule_magazin,$magazincode,$previousqty,$currentqty){

	// 								$this->matricule_article=$matricule_article;
	// 								$this->prixachat=$prixachat;
	// 								$this->prixvente=$prixvente;
	// 								$this->quantityperunit=$quantityperunit;
	// 								$this->quantity=$quantity;
	// 								$this->poids=$poids;
	// 								$this->matricule_format=$matricule_format;
	// 								$this->benefice=$benefice;

	// 								$this->matricule=$matricule;
	// 				    			$t=time();
	// 				           		$datereel=date("Y-m-d H:i:s",$t);
	// 				            	$redacteurcode=$_SESSION["matricule"];
	    	            	        

	//     	            	         try{

	//     	            	         	   $sql="Update entrermagasin Set matricule_article=:matricule_article, prixachat=:prixachat , prixvente=:prixvente ,quantity=:quantity,quantityperunit=:quantityperunit, magazincode=:magazincode,previousqty=:previousqty,currentqty=:currentqty,matricule_magazin:matricule_magazin poids=:poids,matricule_format=:matricule_format,benefice=:benefice,lastmodification=:lastmodification  WHERE matricule = :matricule";
	//     	            	         	   include('../config.php');
	//     	            	         		// echo"this->fullname: ".$this->fullname;

	// 			                        if($stmt = $pdo->prepare($sql)){

	// 										$stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
	// 										$stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
	// 										$stmt->bindParam(":currentqty", $this->currentqty, PDO::PARAM_STR);
	// 										$stmt->bindParam(":matricule_magazin", $this->matricule_magazin, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":prixachat", $this->prixachat, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":prixvente", $this->prixvente, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":poids", $this->poids, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
 //                                                    $stmt->bindParam(":benefice", $this->benefice, PDO::PARAM_STR);

                                                    
			                      
	// 		                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	// 		                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
	// 										            // Attempt to execute the prepared statement
	// 										            if($stmt->execute()){

	// 										            	return "L'Entrer Magasin a ben été modifié";


	// 										            }
	// 										            else{
	// 										            	return "L'Entrer Magasin n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


	// 										            }}

	//     	            	         }
	//     	            	         catch(Exception $e){
	//     	            	         		return "L'Entrer Magasin n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	//     	            	         }






		     
	// 						 }

		

		

		
		public function selectmatricule_article($matricule_article){
    							$this->matricule_article=$matricule_article;
    			

						            	  try{
											    $sql="Select * from entrermagasin Where  matricule_article = :matricule_article  ";
											                	            	         include('../config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
											  
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
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from entrermagasin Where  matricule = :matricule  ";
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
											    $sql="Select * from entrermagasin";
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
														    $sql="Delete from entrermagasin Where  matricule = :matricule  ";
														                	            	         include('../config.php');


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

// $objectCreated=new EntrerMagasin();
// // echo"execute";
// // $codearticle,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$format,$benefice,$numcomand,$numfacture

// echo $objectCreated->ajouter(17,700,800,6,5,6.8,2,0,28);
// echo $objectCreated->modifier("2","code1article",888.0,9.9,99,99,"descri1 1 ption",9.9,"for1 1 mat",88.00,"numcomand","numfacture");
// echo $objectCreated->validationAchatCoursier("1","1");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("2");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

