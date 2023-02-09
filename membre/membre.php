<?php
require("../authentification.php");
require("../config.php");
require("../AutreClass/message.php");

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
	// function __construct($matricule,$fullname,$email,$tel,$position,$role,$status){
	// 	$this->fullname=$fullname;
	// 	$this->email=$email;
	// 	$this->tel=$tel;
	// 	$this->position=$position;
	// 	$this->role=$role;
	// 	$this->matricule=$matricule;
	// 	$this->status=$status;

	// }

	function setparam($fullname,$email,$tel,$position,$role,$status){
		$this->fullname=$fullname;
		$this->email=$email;
		$this->tel=$tel;
		$this->position=$position;
		$this->role=$role;
		$this->status=$status;

	}

    public function ajouter(){
    		


             try{
             		// $this->matriculredacteur=$matriculredacteur;
    			$t=time();
           		$datereel=date("Y-m-d H:i:s",$t);
            	$redacteurcode=$_SESSION["email"];
            	// $redacteurcode="_SESSION";
            	            	         include('../config.php');



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
                               $messageObject=new Message("Le membre a ben ete ajouté", "managemembre.php");
                               $messageObject->sendmessage();



                        }
                        else{
                        	$messageObject=new Message("Le membre n'a pas ete ajouté, Requete Invalid veuillez retenter ", "managemembre.php");
                               $messageObject->sendmessage();


                        }
                    }
                }catch (Exception $e) {
                	$messageObject=new Message("Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."", "managemembre.php");
                               $messageObject->sendmessage();
}
           

            }


             public function modifier($matricule){
    			$this->matricule=$matricule;
    			$t=time();
           		$datereel=date("Y-m-d H:i:s",$t);
            	$redacteurcode=$_SESSION["email"];
            	            	            	         include('../config.php');


            	  $sql="Update  users Set fullname=:fullname, tel=:tel , position=:position , email=:email , role=:role, status=:status  WHERE matricule = :matricule";

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
							            	 $messageObject=new Message("Le membre a ben été modifié", "managemembre.php");
                               				$messageObject->sendmessage();


							            }
							            else{
							            	$messageObject=new Message("Le membre n'a pas ete modifié correctement, Requete Invalid veuillez retenter ", "managemembre.php");
                               $messageObject->sendmessage();

							            }}
							        }



				public function supprimer($matricule){
    			$this->matricule=$matricule;
    			

						            	  try{
						    $sql="Delete from users Where  matricule = :matricule  ";
						                	            	         include('../config.php');


						    if($stmt = $pdo->prepare($sql)){
						      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
						  
						        if($stmt->execute()){
						           $messageObject=new Message("Le membre a ben été supprimé", "managemembre.php");
                               				$messageObject->sendmessage();

						        }
						  
						    }

						  }catch(exception $e){
						     $messageObject=new Message("La suppression a échoué, veuillez retenter", "managemembre.php");
                               				$messageObject->sendmessage();

						  }
							        }


	
}

	?>