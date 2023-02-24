<?php

require("../authentification.php");
require("../db/config.php");



class Sortidetailmagasin{

	private $matricule;
	private $matriculredacteur;
	private $matricule_sorti;
	private $matricule_article;
	private $matricule_format;
	private $date;
	private $matricule_magasin;
	private $situation_matricule;
	private $magazincode;
	private $groupcode_article;
	private $currentqty;
	private $previousqty;
	private $quantity;
	private $quantityperunit;
	private $poids;
	private $validation;
	
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
									$this->matricule_sorti=$matricule_sorti;

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
// 
				
	public function ajouter($matricule_sorti,$designation,$matricule_format,$quantity,$quantityperunit,
		$matricule_magasin)
		{
	    	// $this->matricule=$matricule;

			// $this->matricule_magasin=$matricule_magasin;
			$this->quantityperunit=$quantityperunit;
			$this->matricule_sorti=$matricule_sorti;
			$this->matricule_format=$matricule_format;
			$this->quantity=$quantity;
			$this->situation_matricule=1;
			// include('article.php');
			// include("stockmagasin.php");
			// include("magasin.php");
			// include("sortimagasin.php");
			$magasin=new Magasin();
			$article=new Article();
			$sortimagasin=new Sortimagasin();
			$this->matricule_article=$article->getmatricule($designation);
			$this->groupcode_article=$article->selectmatricule($this->matricule_article)[0][3];
			$stockmagasin=new Stockmagasin();
			echo"select selectQty";
			$this->matricule_magasin=$sortimagasin->selectmatricule($matricule_sorti)[0][1];
			$this->magazincode=$magasin->selectmatricule($matricule_magasin)[0][1];

			$this->previousqty=$stockmagasin->selectQty($this->matricule_article,$this->quantityperunit,$this->matricule_format,$this->magazincode);

			$this->poids=$stockmagasin->selectfrom($this->matricule_article,$this->quantityperunit,$this->matricule_format,$this->magazincode)[0][6];
			echo"\n poids : ".$this->poids;
			echo"\n groupcode_article : ".$this->groupcode_article;
			echo"\n previousqty : ".$this->previousqty;
			echo"\n matricule_article : ".$this->matricule_article;
			echo"\n quantityperunit : ".$this->quantityperunit;
			echo"\n matricule_format : ".$this->matricule_format;
			echo"\n magazincode : ".$this->magazincode;
			echo"\n matricule_magasin : ".$this->matricule_magasin;

			
						// echo$this->previousqty;
			if($this->previousqty>=$this->quantity) {

				echo"// code...just update";
				$this->currentqty=$this->previousqty-$this->quantity;				
				date_default_timezone_set('Africa/Porto-Novo');
				$current_time = date('h:i:s');
				// date("Y-m-d H:i:s",$t);
				$current_date = date('Y-m-d');
				$this->date=$current_date;
				// $this->heure=$current_time;

				echo"this->matricule_sorti: ".$this->matricule_sorti;
				try{

											$t=time();
	           		$datereel=date("Y-m-d H:i:s",$t);
	            	$redacteurcode=$_SESSION["email"];
	            	// $redacteurcode="_SESSION";
        	         include('../db/config.php');
        	            $sql="insert into sortidetailmagasin (matricule_sorti,matricule_article,matricule_format,magazincode,matricule_magasin,groupcode_article,previousqty,currentqty,quantity,quantityperunit,situation_matricule,date,matriculredacteur,lastmodification) values (:matricule_sorti,:matricule_article,:matricule_format,:magazincode,:matricule_magasin,:groupcode_article,:previousqty,:currentqty,:quantity,:quantityperunit,:situation_matricule,:date,:matriculredacteur,:lastmodification)";
             	 if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
                      $stmt->bindParam(":quantityperunit", $this->quantityperunit, PDO::PARAM_STR);
                      $stmt->bindParam(":matricule_sorti", $this->matricule_sorti, PDO::PARAM_STR);
                      $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
                      $stmt->bindParam(":currentqty", $this->currentqty, PDO::PARAM_STR);
                      $stmt->bindParam(":previousqty", $this->previousqty, PDO::PARAM_STR);
                      $stmt->bindParam(":groupcode_article", $this->groupcode_article, PDO::PARAM_STR);
                      $stmt->bindParam(":magazincode", $this->magazincode, PDO::PARAM_STR);
                      $stmt->bindParam(":matricule_magasin", $this->matricule_magasin, PDO::PARAM_STR);
                      $stmt->bindParam(":date", $this->date, PDO::PARAM_STR);
                      $stmt->bindParam(":situation_matricule", $this->situation_matricule, PDO::PARAM_STR);

                      
                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
                      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);

                        if($stmt->execute()){
                        														
								//update stock
								// return "Le sortidetailmagasin a bien ete ajouté ";
                        	return $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$this->currentqty,$this->quantityperunit,$this->poids,$this->matricule_format);
                        }
                        else{
                        	 return "Le sortidetailmagasin n'a pas ete ajouté, Requete Invalid veuillez retenter ";
                        }
                   }
                   else{
                    	return "Le sortidetailmagasin n'a pas ete ajouté, Requete Invalid Execution Fail veuillez retenter ";
                    }


				}
			catch(exception $e){

				return "La sortidetailmagasin n'a pas ete ajouté, Requete Invalid veuillez retenter Error:".$e;
			}

			}
			//next condition
			elseif($this->previousqty<$this->quantity){
				echo"//in else ,exist stock insuffisant,  update in stock by decresing one in stock";
				//just considere detail
				
				$qtyuntdetail=1;
        	 	$matricule_detailformat=3;
        	 	echo "string selectQtytwo($this->groupcode_article,$qtyuntdetail,$matricule_detailformat,$this->magazincode)";
        	 	$previousqtydetail=$stockmagasin->selectQtytwo($this->groupcode_article,$qtyuntdetail,$matricule_detailformat,$this->magazincode);
        	 	echo"//check if exist in detail stock a greater qty to be able to just soustract";
        	 	if($previousqtydetail>($this->quantityperunit*$this->quantity)){
        	 		//reduce in detail
        	 		$currentqty=$previousqtydetail-($this->quantityperunit*$this->quantity);

        	 		echo$this->insertinsorti($this->matricule_article,$this->matricule_sorti,$besoin,$qtyuntdetail,$currentqty,$previousqtydetail,$this->groupcode_article,$this->magazincode,$this->matricule_magasin,$matricule_detailformat,$this->situation_matricule);
        	 		return $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$currentqty,$qtyuntdetail,$this->poids,$matricule_detailformat);


        	 	}
        	 	else{

        	 		echo"//calculate the extra needed";
        	 		//starthere
        	 		$besoinunity=($this->quantityperunit*$this->quantity);
					$disponibleunity=0;
					$resteunityinstock=0;
					$modulo=0;
					$restqty=0;
					$found=0;
					$totalunitavailable=0;
					$formatelement=0;
					$qtyperunitelement=0;
    	 			$articlelement=0;
    	 			$poidselement=0;
    	 			$beforelement=0;
    	 			$besoinlement=0;
    	 			//get disponibility dont consider matricule_detailformat
		        	$disponibility=$stockmagasin->checkdisponibility($this->groupcode_article,$this->magazincode);
		        	echo $disponibility;

	        	 	foreach($disponibility as $element){
	        	 		$totalunitavailable=$totalunitavailable+($element[3]*$element[4]);
	        	 		if($element[3]*$element[4]>=$besoinunity){
	        	 			//take this one and decrease
	        	 			//disponibleunity=40
	        	 			$disponibleunity=$element[3]*$element[4];
	        	 			$resteunityinstock=$disponibleunity-$besoinunity;
	        	 			//element[4] is the qtyperunit
	        	 			//resteunityinstock=35   element[4]=10	modulo=5 restqty=3
	        	 			$modulo=$resteunityinstock%$element[4];
	        	 			$restqty=(int) ($resteunityinstock/$element[4]);

	        	 			$qtyperunitelement=$element[4];
	        	 			$formatelement=$element[5];
	        	 			$articlelement=$element[1];
	        	 			$poidselement=$element[6];
	        	 			$beforelement=$element[3];
	        	 			//besoinlement est ce dont on aura besoin à soustraire 
	        	 			$besoinlement=$beforelement-$restqty;

	        	 			$found=1;
	        	 			echo"found: $found";
	        	 			break;


	        	 		}
		        	 }

		        	echo"found: $found";
	        	 	echo"disponibleunity: $disponibleunity\n";
	        	 	echo"besoinunity: $besoinunity\n";
	        	 	echo"resteunityinstock: $resteunityinstock\n";
	        	 	echo"modulo: $modulo\n";
	        	 	echo"restqty: $restqty\n";

	        	 	//decrease stock and update stock and insert or update detail format 
	        	 	//end here
	        	 	if($found==1){
	        	 		echo$this->insertinsorti($this->matricule_article,$this->matricule_sorti,$besoinlement,$qtyperunitelement,$restqty,$beforelement,$this->groupcode_article,$this->magazincode,$this->matricule_magasin,$formatelement,$this->situation_matricule);
	        	 		$stockmagasin->ajouter($articlelement,$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$restqty,$qtyperunitelement,$poidselement,$formatelement);
	        	 	
	        	 		//reduce in detail because previous qty has been remove 
	        	 		// $currentqty=$previousqtydetail+$besoinunity+$modulo-($this->quantityperunit*$this->quantity);
	        	 		
	        	 		if($modulo>0){
	        	 			$currentqty=$modulo+$previousqtydetail;

		        	 		// echo$this->insertinsorti($this->matricule_article,$this->matricule_sorti,$previousqtydetail,$qtyuntdetail,$currentqty,$previousqtydetail,$this->groupcode_article,$this->magazincode,$this->matricule_magasin,$matricule_detailformat,$this->situation_matricule);
		        	 		 $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$currentqty,$qtyuntdetail,$this->poids,$matricule_detailformat);
		        	 		 return "Stock modifié";

	        	 		}
	        	 		


	        	 	}
	        	 	elseif($totalunitavailable>=$besoinunity){
	        	 		echo"//check by adding";
	        	 		$disponibility=$stockmagasin->disponibility($this->groupcode_article,$this->magazincode);

	        	 		$listarray=array();
	        	 		$totalunit=0;
	        	 		// $besoinunity=($this->quantityperunit*$this->quantity)-$previousqtydetail;
	        	 		echo"besoinunity == : $besoinunity   quantityperunit: $this->quantityperunit  quantity: $this->quantity  previousqtydetail= $previousqtydetail \n\n";
	        	 		print_r($disponibility);
	        	 		foreach($disponibility as $element){
	        	 			$totalunit=$totalunit+($element[3]*$element[4]);

	        	 			$tablearrayone=array(
							                "format" => $element[5],
							           		"qtyunit" => $element[4],            
							           		"qty" => $element[3],            
							           		"poids" => $element[6],            
							           		"articl" => $element[1],            
							        );

	        	 			 array_push($listarray, $tablearrayone);
	        	 			 echo"totalunit: $totalunit  besoinunity: $besoinunity      $totalunit>=$besoinunity";



	        	 			 if($totalunit>=$besoinunity){
			        	 			 	echo "reach";

			        	 			 	$found=1;
			        	 			echo"found: $found";
			        	 			 	break;

	        	 			 }


	        	 		}
						if($found==1){
	    	 			echo"//listarray";
	    	 			$restunity=$totalunit-$besoinunity;
	    	 			// 15	=	20-5
	    	 			$exactotalneeded=$totalunit-$restunity;
	    	 			echo"totalunit  :  $totalunit  besoinunity : $besoinunity  restunity : $restunity  exactotalneeded : $exactotalneeded";
	    	 			foreach($listarray as $element){
	    	 				echo"qty :".$element["qty"]."    qtyunit : ".$element["qtyunit"];
	    	 				if(($exactotalneeded-($element["qty"]*$element["qtyunit"]))>=0){
	    	 					$exactotalneeded=$exactotalneeded-($element["qty"]*$element["qtyunit"]);
	    	 					echo"reduce elemen";

	    	 					

	    	 					echo$this->insertinsorti($element["articl"],$this->matricule_sorti,$element["qty"],$element["qtyunit"],0,$element["qty"],$this->groupcode_article,$this->magazincode,$this->matricule_magasin,$element["format"],$this->situation_matricule);

	    	 					// insertinsorti($matricule_article,$matricule_sorti,$quantity,$quantityperunit,$currentqty,$previousqty,$groupcode_article,$magazincode,$matricule_magasin,$matricule_format)



	    	 					 echo$stockmagasin->ajouter($element["articl"],$this->groupcode_article,$this->matricule_magasin,$this->magazincode,0,$element["qtyunit"],$element["poids"],$element["format"]);


	    	 				}
	    	 				else{
	    	 					$resteunityinstock=($element["qty"]*$element["qtyunit"])-$exactotalneeded;
	    	 					echo"resteunityinstock : $resteunityinstock qtyunit: ".$element["qtyunit"];
	    	 					$modulo=$resteunityinstock%$element["qtyunit"];
		        	 			$currentqty=(int) ($resteunityinstock/$element["qtyunit"]);
		        	 			
		        	 			$poidselement=$element["poids"];
		        	 			$qtybesoin=$element["qty"]-$currentqty;
		        	 			echo"reduce element last";


		        	 			 echo$this->insertinsorti($element["articl"],$this->matricule_sorti,$qtybesoin,$element["qtyunit"],$currentqty,$element["qty"],$this->groupcode_article,$this->magazincode,$this->matricule_magasin,$element["format"],$this->situation_matricule);
		        	 			 $stockmagasin->ajouter($element["articl"],$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$currentqty,$element["qtyunit"],$element["poids"],$element["format"]);
		        	 														        	 					

		        	 			if($modulo>0){
		        	 				$currentqty=$modulo+$previousqtydetail;
		        	 				echo"update detail, modulo: $modulo";
		        	 				
		        	 				// if($previousqtydetail>0){
		        	 				// 	//previousqtydetail exists twice because it matches with qty removed
		        	 				// 	echo$this->insertinsorti($this->matricule_article,$this->matricule_sorti,$previousqtydetail,$qtyuntdetail,$currentqty,$previousqtydetail,$this->groupcode_article,$this->magazincode,$this->matricule_magasin,$matricule_detailformat,$this->situation_matricule);

		        	 				// }

		        	 				  $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$currentqty,$qtyuntdetail,$this->poids,$matricule_detailformat);
		        	 				  echo "end loop";

		        	 			}

	    	 				}

	    	 			}
	    	 			return "retrait exexuter";



	    	 		}
	    	 		else{
	    	 			// echo"//retrait impossible";
	    	 			return "retrait impossible1";

		 			}

	        	 	}else{
	        	 		//imposible
	        	 		echo "totalunitavailable is : ".$totalunitavailable;
	        	 		return "Retrait impossible2 ${totalunitavailable}";
	        	 	}
        	 	}
			}
			else{
				return "bad request hei nno existe";
			}	 
		}

	public function insertinsorti($matricule_article,$matricule_sorti,$quantity,$quantityperunit,$currentqty,$previousqty,$groupcode_article,$magazincode,$matricule_magasin,$matricule_format,$situation_matricule){
	// $this->currentqty=$this->previousqty-$this->quantity;				
						date_default_timezone_set('Africa/Porto-Novo');
						$current_time = date('h:i:s');
						// date("Y-m-d H:i:s",$t);
						$current_date = date('Y-m-d');
						$this->date=$current_date;
						// $this->heure=$current_time;

						echo"this->matricule_sorti: ".$this->matricule_sorti;
						try{

													$t=time();
			           		$datereel=date("Y-m-d H:i:s",$t);
			            	$redacteurcode=$_SESSION["email"];
			            	// $redacteurcode="_SESSION";
			            	            	         include('../db/config.php');
			            	            	            $sql="insert into sortidetailmagasin (matricule_sorti,matricule_article,matricule_format,magazincode,matricule_magasin,groupcode_article,previousqty,currentqty,quantity,quantityperunit,situation_matricule,date,matriculredacteur,lastmodification) values (:matricule_sorti,:matricule_article,:matricule_format,:magazincode,:matricule_magasin,:groupcode_article,:previousqty,:currentqty,:quantity,:quantityperunit,:situation_matricule,:date,:matriculredacteur,:lastmodification)";
			             	 if($stmt = $pdo->prepare($sql)){
			                      $stmt->bindParam(":matricule_article", $matricule_article, PDO::PARAM_STR);
			                      $stmt->bindParam(":quantityperunit", $quantityperunit, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule_sorti", $matricule_sorti, PDO::PARAM_STR);
			                      $stmt->bindParam(":quantity", $quantity, PDO::PARAM_STR);
			                      $stmt->bindParam(":currentqty", $currentqty, PDO::PARAM_STR);
			                      $stmt->bindParam(":previousqty", $previousqty, PDO::PARAM_STR);
			                      $stmt->bindParam(":groupcode_article", $groupcode_article, PDO::PARAM_STR);
			                      $stmt->bindParam(":magazincode", $magazincode, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule_magasin", $matricule_magasin, PDO::PARAM_STR);
			                      $stmt->bindParam(":date", $this->date, PDO::PARAM_STR);
			                      $stmt->bindParam(":situation_matricule", $situation_matricule, PDO::PARAM_STR);
			                      
			                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
			                      $stmt->bindParam(":matricule_format", $matricule_format, PDO::PARAM_STR);
			                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);

			                        if($stmt->execute()){
			                        														
											echo "update stock";
											//update stock
											// return "Le sortidetailmagasin a bien ete ajouté ";
	// return $stockmagasin->ajouter($this->matricule_article,$this->groupcode_article,$this->matricule_magasin,$this->magazincode,$this->currentqty,$this->quantityperunit,$this->poids,$this->matricule_format);


			                               



			                        }
			                        else{
			                        	 return "Le sortidetailmagasin n'a pas ete ajouté, Requete Invalid veuillez retenter ";
			                        	


			                        }
			                    }else{
			                    		 return "Le sortidetailmagasin n'a pas ete ajouté, Requete Invalid Execution Fail veuillez retenter ";


			                    }


							}
						catch(exception $e){

												return "La sortidetailmagasin n'a pas ete ajouté, Requete Invalid veuillez retenter Error:".$e;

												}
	}


	public function modifier($matricule,$matricule_sorti,$matricule_article,$matricule_format,$quantity){

				// $this->code=$this->generatecode($nom);

				$this->quantity=$quantity;
				$this->matricule_article=$matricule_article;
				$this->matricule_sorti=$matricule_sorti;
				$this->matricule_format=$matricule_format;


				$this->matricule=$matricule;
				$t=time();
	       		$datereel=date("Y-m-d H:i:s",$t);
	        	$redacteurcode=$_SESSION["email"];
		        

		         try{

		         	   $sql="Update  sortidetailmagasin Set matricule_sorti=:matricule_sorti , matricule_article=:matricule_article , matricule_format=:matricule_format, matriculredacteur=:matriculredacteur , lastmodification=:lastmodification  WHERE matricule=:matricule";
		         	   include('../db/config.php');
		         		// echo"this->fullname: ".$this->fullname;

	                if($stmt = $pdo->prepare($sql)){

	          $stmt->bindParam(":matricule_article", $this->matricule_article, PDO::PARAM_STR);
	          $stmt->bindParam(":matricule_sorti", $this->matricule_sorti, PDO::PARAM_STR);
	          $stmt->bindParam(":matricule_format", $this->matricule_format, PDO::PARAM_STR);

	          
	          $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
	          $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
	          $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
						            
						          
						           
						            
						            // Attempt to execute the prepared statement
						            if($stmt->execute()){

						            	return "Le Sortidetailmagasin a ben été modifié";


						            }
						            else{
						            	return "Le sortidetailmagasin n'a pas ete modifié correctement, Requete Invalid veuillez retenter ";


						            }}

		         }
		         catch(Exception $e){
		         		return "Le sortidetailmagasin n'a pas ete modifié, Requete Invalid veuillez retenter Error:".$e;



		         }







		 }

		 public function validation($matricule,$validation){

				$this->validation=$validation;
				
				$this->matricule=$matricule;
				$t=time();
	       		$datereel=date("Y-m-d H:i:s",$t);
	        	$redacteurcode=$_SESSION["email"];
	        	$this->matriculevalidation=$_SESSION["matricule"];
		        

		         try{

		         	   $sql="Update  sortidetailmagasin Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule = :matricule";
		         	   include('../db/config.php');
		         		// echo"this->fullname: ".$this->fullname;

	                if($stmt = $pdo->prepare($sql)){

						 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
						 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
						 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);
	          
	          
	          $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
						            
						          
						           
						            
						            // Attempt to execute the prepared statement
						            if($stmt->execute()){

						            	return "L'sortidetailmagasin   a ben été validé";


						            }
						            else{
						            	return "L'sortidetailmagasin   n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


						            }}

		         }
		         catch(Exception $e){
		         		return "L'sortidetailmagasin   n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



		         }







		 }



	public function validationsorti($matricule,$validation){
	echo"in validationsorti";

				$this->validation=$validation;
				
				$this->matricule=$matricule;
				$t=time();
	       		$datereel=date("Y-m-d H:i:s",$t);
	        	$redacteurcode=$_SESSION["email"];
	        	$this->matriculevalidation=$_SESSION["matricule"];
		        

		         try{

		         	   $sql="Update  sortidetailmagasin Set validation=:validation, tempsvalidation=:tempsvalidation, matriculevalidation=:matriculevalidation WHERE matricule=:matricule";
		         	   include('../db/config.php');
		         		// echo"this->fullname: ".$this->fullname;

	                if($stmt = $pdo->prepare($sql)){

						 $stmt->bindParam(":validation", $this->validation, PDO::PARAM_STR);
						 $stmt->bindParam(":tempsvalidation", $datereel, PDO::PARAM_STR);
						 $stmt->bindParam(":matriculevalidation", $this->matriculevalidation, PDO::PARAM_STR);

	          
	          
	          $stmt->bindParam(":matricule", $matricule, PDO::PARAM_STR);
						            
						          
						           
						            
						            // Attempt to execute the prepared statement
						            if($stmt->execute()){
						            	// include("sortimagasin.php");


										echo"Sortimagasin instance below";

										$sortimagasin=new Sortimagasin();
										echo"getting matricule_module";
										

										return $matricule_module=$sortimagasin->selectmatricule($this->selectmatricule($this->matricule)[0][1])[0][3];
									

						            	// return "L'sortidetailmagasin   a ben été validé";


						            }
						            else{
						            	return "L'sortidetailmagasin   n'a pas ete validé correctement, Requete Invalid veuillez retenter ";


						            }}

		         }
		         catch(Exception $e){

		         		return "L'sortidetailmagasin   n'a pas ete validé, Requete Invalid veuillez retenter Error:".$e;



		         }







		 }

	public function selectmatricule($matricule){
			$this->matricule=$matricule;


	            	  try{
						    $sql="Select * from sortidetailmagasin Where  matricule = :matricule  ";
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
							 return "La selection a échoué, veuillez retenter. Error: ".$e;
						     

						  }
		        }

	public function selectAll(){


			            	  try{
								    $sql="Select * from sortidetailmagasin";
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
									 return "La selection a échoué, veuillez retenter. Error: ".$e;
								     

								  }
				        }
	public function selectAllNonValider(){


			            	  try{
								    $sql="SELECT sortidetail.matricule, art.designation, sortidetail.quantity, sortidetail.quantityperunit, sortidetail.currentqty,sortidetail.groupcode_article, sortimg.libeller,sortidetail.date, form.nom FROM sortidetailmagasin sortidetail, article art, format form, sortimagasin sortimg where form.matricule=sortidetail.matricule_format AND art.matricule=sortidetail.matricule_article AND sortimg.matricule=sortidetail.matricule_sorti AND sortidetail.validation=0";
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
	public function selectAllValider(){


			            	  try{
								    $sql="SELECT sortidetail.matricule, art.designation, sortidetail.quantity, sortidetail.quantityperunit, sortidetail.currentqty,sortidetail.groupcode_article, sortimg.libeller,sortidetail.date, form.nom FROM sortidetailmagasin sortidetail, article art, format form, sortimagasin sortimg where form.matricule=sortidetail.matricule_format AND art.matricule=sortidetail.matricule_article AND sortimg.matricule=sortidetail.matricule_sorti AND sortidetail.validation=1";
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
											    $sql="Delete from sortidetailmagasin Where  matricule = :matricule  ";
											                	            	         include('../db/config.php');


											    if($stmt = $pdo->prepare($sql)){
											      $stmt->bindParam(":matricule", $this->matricule, PDO::PARAM_STR);
											  
											        if($stmt->execute()){
											        	return "La Sortidetailmagasin a ben été supprimé";
											          

											        }
											  
											    }

											  }
											catch(exception $e){
												 return "La suppression a échoué, veuillez retenter. Error: ".$e;
											     

											  }
				        }
				

	
}

// $objectCreated=new Sortidetailmagasin(); 
// echo$objectCreated->ajouter(2,"Boite Doliprane 500mg",1,5,2,
// 		1);
// public function ajouter($matricule_sorti,$designation,$matricule_format,$quantity,$quantityperunit,$matricule_magasin)
// echo $objectCreated->ajouter(2,"Boite Spasfon 500mg",2,2,99,1);
// echo $objectCreated->ajouter(2,"Boite Dafalgan 500mg",2,14,5,1);
// echo $objectCreated->modifier(1,88,888,889,89);
// echo $objectCreated->supprimer("1");
// print_r($objectCreated->selectmatricule("1"));
// print_r($objectCreated->selectAll());

	?>

