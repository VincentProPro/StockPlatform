<?php
ob_start();

$formulaire=htmlspecialchars($_POST['formulaire']);

require("../Model/caisse.php");
switch ($formulaire) {
    case "caissepayment":
    // echo"entrerachat";
        ajoutcaisse();
        break;
    
}
// function validerachatcoursier(){
//     $matricule=$_POST['matricule'];
        
       
//             $objectCreated=new Surveillante();
//         // echo"execute executebondecommande";
//          $objectCreated->validationAchatCoursier($matricule);


// }
function ajoutcaisse(){
        $module=htmlspecialchars($_POST['module']);
        $apayer=htmlspecialchars($_POST['apayer']);
        $description=htmlspecialchars($_POST['description']);

        $prix=htmlspecialchars($_POST['prix']);
        $titre=htmlspecialchars($_POST['titre']);
        $recu=htmlspecialchars($_POST['recu']);
        $reglement=htmlspecialchars($_POST['reglement']);
        $nameInput=htmlspecialchars($_POST['nameInput']);
        $phoneInput=htmlspecialchars($_POST['phoneInput']);
        

       
            $objectCreated=new Caisse();
        // echo"execute executebondecommande";
         $objectCreated->ajoutcaisse($module,$titre,$description,$prix,$recu,$apayer,$reglement,$phoneInput,$nameInput);


}

    ob_end_flush(); // Flush the output from the buffer

?>