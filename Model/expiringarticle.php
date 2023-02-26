<?php

require("../authentification.php");
// require("../db/config.php");
class ExpiringArticle{

	private $matricule;
	private $matricule_article;
	private $quantity;

	private $dateexpiring;
	private $groupcode_article;
	private $dateadded;
	private $matricule_situation;
	private $matricule_format;
	private $matricule_lieu;

	function __construct(){}
	
	public function ajouter($name_article,$dateexpiring,$matricule_situation,$quantity,$matricule_format,$matricule_lieu){
				// $this->matricule_article=$matricule_article;
				// $this->groupcode_article=$groupcode_article;
				$this->matricule_situation=$matricule_situation;
				$this->dateexpiring=$dateexpiring;
				$this->quantity=$quantity;
                $this->matricule_format=$matricule_format;
                $this->matricule_lieu=$matricule_lieu;
                $objetarticle=new Article();
                echo"this->matricule_format".$this->matricule_format;
				echo "article";
				$articledata=$objetarticle->getarticle($name_article);
				$this->matricule_article=$articledata["matricule"];
				$this->groupcode_article=$articledata["groupcode"];
                echo"Voici: ".$this->matricule_article.$this->groupcode_article;
				// return "gooo";
				







		             try{
		             		// $this->matriculredacteur=$matriculredacteur;
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
                        $this->dateadded=$datereel;

		            	$redacteurcode=$_SESSION["email"];
		            	// $this->dateachat=$datereel;
		            	// $redacteurcode="_SESSION";
		            	            	         include('../db/config.php');
		            	            	         $sql="Select matricule, quantity from expiretb Where  dateexpiring=:dateexpiring  AND  groupcode_article=:groupcode_article AND matricule_format=:matricule_format AND matricule_lieu=:matricule_lieu";


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":dateexpiring", $this->dateexpiring, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_lieu", $this->matricule_lieu, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        	 	$currentqty=$arraystable[0][1]+$this->quantity;
											        	 	$this->matricule=$arraystable[0][0];

											        		$sql="Update expiretb SET quantity=:quantity Where  matricule=:matricule";
											                	            	         // include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":quantity", $currentqty, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        												    	// echo"update in cmustcok";
											        				return "La table des dates d'expiration a ben été mise à jour ";

											        	// return "L'cmuentrer  a ben été enregistré";

											        }}
											    }else{
											    	echo"insert in ExpiringArticle";
											    	//insert
											    	// include("article.php");
											    	//  $article=new Article();
											    	// $groupcode_article=$article->selectmatricule($this->matricule_article)[0][1];
											    	// $code_article=$article->selectmatricule(2)[0][1];
											    	 $sql="insert into  expiretb (groupcode_article,matricule_article,quantity,dateexpiring,dateadded,matricule_situation, matriculredacteur,matricule_format,matricule_lieu)
                                                      values (:groupcode_article,:matricule_article,:quantity,:dateexpiring,:dateadded,:matricule_situation,:matriculredacteur,:matricule_format,:matricule_lieu)";
		             	 if($stmt = $pdo->prepare($sql)){
		             	 	


                            $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
                            $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_situation", $this->matricule_situation, PDO::PARAM_STR);
                                                    $stmt->bindParam(":dateexpiring", $this->dateexpiring, PDO::PARAM_STR);
                                                    $stmt->bindParam(":dateadded", $this->dateadded, PDO::PARAM_STR);
                                                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matricule_lieu", $this->matricule_lieu, PDO::PARAM_STR);
                                                    $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);


		                        if($stmt->execute()){
		                        	return "La date d'eexpiration a ben été enregistré pour cet article";


		                        }}


											    }
										}}

		            	   
		    	    
		                }catch (Exception $e) {
		                	return "Stock Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}
           

           			 }


    		


     public function reduce($matricule_article,$groupcode_article,$quantity,$dateexpiring,$matricule_lieu,$matricule_format){

                $this->matricule_article=$matricule_article;
				$this->groupcode_article=$groupcode_article;
				$this->dateexpiring=$dateexpiring;
				$this->quantity=$quantity;
				$this->matricule_format=$matricule_format;
				$this->matricule_lieu=$matricule_lieu;
				// echo "in reduce expiretb";
				// echo" matricule_article : ".$matricule_article." groupcode_article : ".$groupcode_article." quantity : ".$quantity." dateexpiring ".$dateexpiring." matricule_lieu : ".$matricule_lieu." matricule_format : ".$matricule_format;
					    			
	    	            	        

	    	            	         try{
                                        include('../db/config.php');
                                        $sql="Select matricule, quantity from expiretb Where  dateexpiring=:dateexpiring  AND  groupcode_article=:groupcode_article AND matricule_format=:matricule_format AND matricule_lieu=:matricule_lieu";


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":dateexpiring", $this->dateexpiring, PDO::PARAM_STR);
											      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule_lieu", $this->matricule_lieu, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	 if($stmt->rowCount()>0){
											        	 	$arraystable= $stmt->fetchAll();
											        	 	$currentqty=$arraystable[0][1]-$this->quantity;
											        	 	$this->matricule=$arraystable[0][0];
                                                             $sql="Update  expiretb Set quantity=:quantity Where  matricule=:matricule ";
	    	            	         		// echo"this->fullname: ".$this->fullname;

				                        if($stmt = $pdo->prepare($sql)){

											$stmt->bindParam(":quantity", $currentqty, PDO::PARAM_STR);
											// $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
											      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);											            
											          
											            // Attempt to execute the prepared statement
											            if($stmt->execute()){

											            	return "L'article expirant le ".$this->dateexpiring." a bien été retiré du stock";


											            }
											            else{
															return "L'article expirant le ".$this->dateexpiring." n'a pas été retiré du stock correctement, Requete Invalid";


											            }}else{
															return "L'article expirant le ".$this->dateexpiring." n'a pas été retiré du stock correctement, Requete Invalid";

														}

                                                         }else{
															return "L'article n'est pas dans le stock des articles expirants";

														 }
                                                    }
                                                }

	    	            	         	  

	    	            	         }
	    	            	         catch(Exception $e){
	    	            	         		return "Le stock n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



	    	            	         }






		     
							 }

		
		
		public function selectmatricule($matricule){
    							$this->matricule=$matricule;
    			

						            	  try{
											    $sql="Select * from expiretb Where  matricule=:matricule  ";
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
											    $sql="SELECT expiretb.matricule, expiretb.groupcode_article,expiretb.quantity, expiretb.dateadded, expiretb.dateexpiring, expiretb.matricule_lieu, article.designation FROM expiretb JOIN article ON expiretb.matricule_article=article.matricule";
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
		public function selectAllInthreeMois(){
    			

            try{
                  $sql="SELECT expiretb.matricule, expiretb.groupcode_article,expiretb.quantity, expiretb.dateadded, expiretb.dateexpiring, article.designation FROM expiretb JOIN article ON expiretb.matricule_article=article.matricule WHERE expiretb.dateexpiring Between now() And now()+INTERVAL 3 MONTH";
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
        public function selectAllInSixMois(){
    			

    try{
          $sql="SELECT expiretb.matricule, expiretb.groupcode_article,expiretb.quantity, expiretb.dateadded, expiretb.dateexpiring, expiretb.matricule_lieu article.designation FROM expiretb JOIN article ON expiretb.matricule_article=article.matricule WHERE expiretb.dateexpiring Between now() And now()+INTERVAL 6 MONTH";
                                                //    include('../db/config.php');


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
														    $sql="Delete from expiretb Where  matricule=:matricule  ";
														                	            	         include('../db/config.php');


														    if($stmt = $pdo->prepare($sql)){
														      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
														  
														        if($stmt->execute()){
														        	return "L expire article  a ben été supprimé";
														          

														        }
														  
														    }

														  }
														catch(exception $e){
															 return "La suppression a échoué, veuillez retenter. Error: ".$e;
														     

														  }
							        }


	
}

$objectCreated=new ExpiringArticle();
// echo"execute";
// ajouter($matricule_article,$groupcode_article,$dateexpiring,$matricule_situation,$dateadded,$quantity,$matricule_format,$matricule_lieu)
// echo $objectCreated->ajouter(1,"GAVIS",'2025-08-29',2,'2022-02-23',20,2,1);
// echo $objectCreated->ajouter(7,"PARA",'2024-03-23',2,'2022-02-23',3,2,1);
// echo $objectCreated->ajouter(7,"PARA",'2024-06-23',2,'2022-02-23',3,2,1);
// echo $objectCreated->ajouter(7,"PARA",'2024-06-21',2,'2022-02-23',3,2,1);
// echo $objectCreated->ajouter(7,"PARA",'2024-05-3',2,'2022-02-23',3,2,1);
// echo $objectCreated->modifier(17,"SPSFN",1,90    ,5,2);
// echo $objectCreated->validationAchatCoursier("1","1");


// echo $objectCreated->executeCommande("7");
// echo $objectCreated->supprimer("2");
// print_r($objectCreated->selectmatricule("1"));
// echo"<br>in print<br>";
// print_r($objectCreated->selectAllInthreeMois());

	?>

