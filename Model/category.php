<?php
require("../authentification.php");
require("../db/config.php");
// require("../AutreClass/message.php");

class Category{

	private $code;
	private $matricule;
	private $nom;
	private $matriculredacteur;
	private $description;
	
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

				public function setparamedit($code,$nom,$decription){
									$this->code=$code;
									$this->nom=$nom;
									$this->description=$description;

					}
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

				
    public function ajouter($nom,$description){
				    	// $this->matricule=$matricule;
						$this->code=$this->generatecode($nom);
						$this->nom=$nom;
						$this->description=$description;

						// echo"this->fullname: ".$this->fullname;
						try{

													$t=time();
			           		$datereel=date("Y-m-d H:i:s",$t);
			            	$redacteurcode=$_SESSION["email"];
			            	// $redacteurcode="_SESSION";
			            	            	         include('../db/config.php');
			            	            	            $sql="insert into categoritable (code,nom,description,matriculredacteur,lastmodification) values (:code,:nom,:description,:matriculredacteur,:lastmodification)";
			             	 if($stmt = $pdo->prepare($sql)){
			                      $stmt->bindParam(":code", $this->code, PDO::PARAM_STR);
			                      $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
			                      $stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
			                      
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);

			                        if($stmt->execute()){
			                        														return "La Catégorie a bien ete ajouté ";


			                               



			                        }
			                        else{
			                        	 return "La Catégorie n'a pas ete ajouté, Requete Invalid veuillez retenter ";
			                        	


			                        }
			                    }else{
			                    		 return "La Catégorie n'a pas ete ajouté, Requete Invalid Execution Fail veuillez retenter ";


			                    }


												}catch(exception $e){

												return "La Catégorie n'a pas ete ajouté, Requete Invalid veuillez retenter Error:".$e;

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


						$sql = "SELECT * FROM categoritable WHERE code = :code ";
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


    public function modifier($matricule,$code,$nom,$description){

									$this->code=$code;
									$this->nom=$nom;
									$this->description=$description;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  categoritable Set code=:code, nom=:nom , description=:description , matriculredacteur=:matriculredacteur , lastmodification=:lastmodification  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											 $stmt->bindParam(":code", $this->code, PDO::PARAM_STR);
			                      $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
			                      $stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
			                      
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "La Catégorie a ben été modifié";


											            }
											            else{
											            	return "Le Catégorie n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "La Catégorie n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }



				public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from categoritable Where  matricule = :matricule  ";
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
											    $sql="Select * from categoritable";
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
														    $sql="Delete from categoritable Where  matricule = :matricule  ";
														                	            	         include('../db/config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "La Catégorie a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }
		

	
}

// $objectCreated=new Format();
// echo $objectCreated->ajouter("code","nom","description");
// echo $objectCreated->modifier("5","code5","nom","description");
// echo $objectCreated->supprimer("5");
// print_r($objectCreated->selectmatricule("5"));
// print_r($objectCreated->selectAll());

	?>

