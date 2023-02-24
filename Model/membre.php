<?php
require("../authentification.php");
require("../db/config.php");
// require("../AutreClass/message.php");

class Membre{

	private $fullname;
	private $matricule;
	private $status;
	private $matriculredacteur;
	private $email;
	private $tel;
	private $position;
	private $role;
	function __construct(){}


				public function setparamedit($matricule,$fullname,$email,$tel,$position,$role,$status){
					$this->matricule=$matricule;
					$this->fullname=$fullname;
					$this->email=$email;
					$this->tel=$tel;
					$this->position=$position;
					$this->role=$role;
					$this->status=$status;

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

				// public function callnotification($messageici, $locationpage){
				// 		echo"callnotification \n ";
				// 				echo "Message: ".$messageici." goto $locationpage";

				// 				// $messageObject=new Message($messageici, $locationpage);
				//      //                           $messageObject->sendmessage();

				// 		}
    			public function ajouter($fullname,$email,$tel,$position,$role,$status){
				    	// $this->matricule=$matricule;
						$this->fullname=$fullname;
						$this->email=$email;
						$this->tel=$tel;
						$this->position=$position;
						$this->role=$role;
						$this->status=$status;

						// echo"this->fullname: ".$this->fullname;
						try{
													echo"this->fullname: ".$this->fullname;

													$t=time();
			           		$datereel=date("Y-m-d H:i:s",$t);
			            	$redacteurcode=$_SESSION["email"];
			            	// $redacteurcode="_SESSION";
			            	            	         include('../db/config.php');
			            	            	            $sql="insert into users(fullname,tel,email,position,role,status,matriculredacteur,lastmodification) values (:fullname,:tel,:email,:position,:role,:status,:matriculredacteur,:lastmodification)";
			             	 if($stmt = $pdo->prepare($sql)){
			                      $stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
			                      $stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
			                      $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
			                      $stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
			                      $stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
			                      $stmt->bindParam(":status", $this->status, PDO::PARAM_STR);
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);

			                        if($stmt->execute()){

			                        	return "Le membre a bien ete ajouté ";

			                               



			                        }
			                        else{
			                        	 return "Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ";
			                        	


			                        }
			                    }else{
			                    		return "Le membre n'a pas ete ajouté, Requete Invalid Execution Fail veuillez retenter ";


			                    }


												}catch(exception $e){

												 return "Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter Error:".$e;

												}
    		


			     
           				}


            	public function modifier($matricule,$fullname,$email,$tel,$position,$role,$status){

									$this->fullname=$fullname;
									$this->email=$email;
									$this->tel=$tel;
									$this->position=$position;
									$this->role=$role;
									$this->status=$status;

									$this->matricule=$matricule;
					    			$t=time();
					           		$datereel=date("Y-m-d H:i:s",$t);
					            	$redacteurcode=$_SESSION["email"];
	    	            	        

	    	            	         try{

	    	            	         	   $sql="Update  users Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";
	    	            	         	   include('../db/config.php');
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											$stmt->bindParam(":fullname", $this->fullname, PDO::PARAM_STR);
											$stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);

											$stmt->bindParam(":tel", $this->tel, PDO::PARAM_STR);
											$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
											$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
											$stmt->bindParam(":role", $this->role, PDO::PARAM_STR);
											$stmt->bindParam(":status", $this->status, PDO::PARAM_STR);

											            
											          
											           
											            
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "Le membre a ben été modifié";


											            }
											            else{
											            	return "Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


											            }}

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le membre n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }



				public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from users Where  matricule = :matricule  ";
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
											    $sql="Select * from users";
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
											    $sql="Delete from users Where  matricule = :matricule  ";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	return "Le membre a ben été supprimé";
											          

											        }
											  
											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
							        }
		

	
}
// echo"execute";
$objectMembre=new Membre();
// ajouter($fullname,$email,$tel,$position,$role,$status)
// echo$objectMembre->ajouter("Delphine Dede","dede@gmail.com","610000000","Etudiante IT","PDG","active");
echo$objectMembre->modifier(98887796,"Delphine Dede Beavogui","dedebea@gmail.com","610333333","Etudiante IT","PDG","active");
// echo $objectMembre->modifier("98887793","vincent edit","email@gmail.com","3334333","medecin chirugien","Admin","active");
// echo $objectMembre->supprimer("98887793");
// print_r($objectMembre->selectmatricule("98887794"));
// print_r($objectMembre->selectAll());



	?>

