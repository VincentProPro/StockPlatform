
<?php

        session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../logout.php");
    exit;
}

              $codeis=$_POST['codeis'];
              $nommdf=$_POST['nommdf'];
              $telmdf=$_POST['telmdf'];
              $locationmdf=$_POST['locationmdf'];
              $emailmdf=$_POST['emailmdf'];
              $plusinfomdf=$_POST['plusinfomdf'];
                 
            $t=time();
            $datereel=date("Y-m-d H:i:s",$t);
            $redacteurcode=$_SESSION["email"];
                    // $redacteurcode="gastron@gmail.com";
            echo "variable: ".$codeis.$nommdf.$locationmdf.$telmdf.$emailmdf.$plusinfomdf;


         include('../../config.php');



           $sql="Update  fournisseurdb Set nom=:nommdf, tel=:telmdf, email=:emailmdf, location=:locationmdf, plusinfo=:plusinfomdf, matriculredacteur=:matriculredacteur, lastmodification=:lastmodification WHERE code = :codeis";

              if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":nommdf", $nommdf, PDO::PARAM_STR);
                      $stmt->bindParam(":telmdf", $telmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":emailmdf", $emailmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":locationmdf", $locationmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":plusinfomdf", $plusinfomdf, PDO::PARAM_STR);
                      $stmt->bindParam(":codeis", $codeis, PDO::PARAM_STR);
                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                        if($stmt->execute()){
                               echo "<script>alert('Success!');</script>";
                                 header("location: fournisseurmanage.php");




                        }
                        else{
                                      // echo "This is a problem ";
                                                                     echo "<script>alert('Invalid!');</script>";


                        }
                      }
                      else{
                                                                     echo "<script>alert('Invalid!');</script>";

                        }
        

?>


 