<?php
   ob_start();
$formulaire=$_POST['formulaire'];

require("../Model/surveillante.php");

switch ($formulaire) {
    case "bondecommande":
        ajoutbondecommande();
        break;
    case "executer":
        executerbondecommande();
        break;
    case "sortimagasin":
        ajoutsortimagasin();
        break;
    case "executersorti":
        executersortimagasin();
        break;

    case "validerachatentrer":
	    validerachatentrer();
	    break;

    case "validerSortidetail":
	    validerSortidetail();
	    break;
    case "achatcoursier":
        echo "i is achatcoursier";
        validerachatcoursier();
        break;

	    
}

function ajoutbondecommande(){
	$magasin=$_POST['magasin'];
        $description=$_POST['description'];

        $libeller=$_POST['libeller'];
        $situation=$_POST['situation'];
        $tarif=$_POST['tarif'];
       
			$objectCreated=new Surveillante();
		// echo"execute executebondecommande";
		 $objectCreated->generatebesoin($libeller,$description,$tarif,$magasin,$situation);


}

function executerbondecommande(){
	$matriculebond=$_POST['matricule'];
        
       
			$objectCreated=new Surveillante();
		// echo"execute executebondecommande";
		 $objectCreated->executebesoin($matriculebond);


}
function validerachatentrer(){
	$matricule=$_POST['matricule'];
        
       
			$objectCreated=new Surveillante();
		// echo"execute executebondecommande";
		 $objectCreated->validationAchatEntrer($matricule);


}
function validerachatcoursier(){
	$matricule=$_POST['matricule'];
        
       
			$objectCreated=new Surveillante();
		echo"execute achatcoursier";
		 $objectCreated->validationCoursier($matricule);


}
function validerSortidetail(){
	$matricule=$_POST['matricule'];
        
       
			$objectCreated=new Surveillante();
		echo"execute validerSortidetail";
		 $objectCreated->validationSortidetailmagasin($matricule);


}

function ajoutsortimagasin(){
    $matricule_module=$_POST['modulecode'];
                                    $matricule_magasin=$_POST['magasin'];

                                    $libeller=$_POST['libeller'];
                             
                                   

       
            $objectCreated=new Surveillante();
        // echo"execute executebondecommande";
         $objectCreated->generatesortimagasin($matricule_magasin,$matricule_module,$libeller);


}

function executersortimagasin(){
	$matricule=$_POST['matricule'];
        
       
			$objectCreated=new Surveillante();
		// echo"execute executebondecommande";
		 $objectCreated->executeretrait($matricule);


}
    ob_end_flush(); // Flush the output from the buffer
?>