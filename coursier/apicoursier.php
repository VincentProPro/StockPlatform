<?php
ob_start();

require("../Model/coursier.php");


$formulaire=$_POST['formulaire'];

// require("../Model/article.php");

switch ($formulaire) {
    case "achatcoursier":
            // echo"execute achatentrer";

        ajoutachatcoursier();
        break;
    case "executer":
        // executerbondecommande();
        break;
    case "valider":
        // validerbondecommande();
        break;
}

function ajoutachatcoursier(){
	$poids=$_POST['poids'];
        $quantity=$_POST['quantite'];
        $matricule_format=$_POST['format'];
 
        // $t=time();
        // $datereel=date("Y-m-d H:i:s",$t);
        // $dateentrer=trim($_POST["date"]);
        // $codeis=$datereel;
        // $idtimetable_err='' ;
        $matricule_comand=trim($_POST["comandnum"]);
        $numfacture=$_POST['facturnum'];
        $prixachat=$_POST['prixachat'];
        $prixvente=0.0;
        $quantityperunit=$_POST['quantityperunit'];
        $description=$_POST['description'];
        $article=$_POST['autocomplete-search'];
        $benefice=0.0;



       
			$objectCreated=new Coursier();
		// echo"execute achatentrer";
		 $objectCreated->achatentrer($article,$prixachat,$prixvente,$quantity,$quantityperunit,$description,$poids,$matricule_format,$benefice,$matricule_comand,$numfacture);


}
    ob_end_flush(); // Flush the output from the buffer


?>