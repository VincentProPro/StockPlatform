<?php
ob_start();
$formulaire=$_POST['formulaire'];

require("../Model/gestionnairestock.php");
switch ($formulaire) {
    case "entrerachat":
    // echo"entrerachat";
        ajoutentrerachat();
        break;
    case "executer":
        executerretrait();
        break;
    case "sortidetail":
        echo "i is cake";
        ajoutsortidetail();
        break;
    case "achatcoursier":
        // echo "i is cake";
        // validerachatcoursier();
        break;
}
// function validerachatcoursier(){
//     $matricule=$_POST['matricule'];
        
       
//             $objectCreated=new Surveillante();
//         // echo"execute executebondecommande";
//          $objectCreated->validationAchatCoursier($matricule);


// }
function ajoutentrerachat(){
    $reference=$_POST['reference'];
        $fournicode=$_POST['fournisseur'];
        $magasin=$_POST['magasin'];

        $libeller=$_POST['libeller'];
        $tarif=$_POST['tarif'];
 
        
        $numcomand=trim($_POST["comandnum"]);
        $numfacture=$_POST['facturnum'];

       
            $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";
         $objectCreated->generateachatentrer($magasin,$reference,$libeller,$tarif,$fournicode,$numcomand,$numfacture);


}
function ajoutsortidetail(){
        // $fournicode=$_POST['fournisseur'];
        $magasin=$_POST['magasin'];

        $matricule_sorti=$_POST['codesorti'];
        $quantity=$_POST['quantity'];
        $quantityperunit=$_POST['quantityperunit'];
 
        
        $matricule_format=trim($_POST["format"]);
        $article=$_POST['autocomplete-search'];


       
            $objectCreated=new Gestionnairestock();
        // echo"execute executebondecommande";

         $objectCreated->generatedetailsortimagasin($matricule_sorti,$article,$matricule_format,$quantity,$quantityperunit,$magasin);


}

function executerretrait(){
	$matricule=$_POST['matricule'];
        
       
			$objectCreated=new Gestionnairestock();
		// echo"execute executebondecommande";
		 $objectCreated->executeretrait($matricule);


}
    ob_end_flush(); // Flush the output from the buffer

?>