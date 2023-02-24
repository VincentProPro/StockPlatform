
<?php

        session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../logout.php");
    exit;
}
         include('../../db/config.php');


              $nommdf=$_POST['nommdf'];
              $telmdf=$_POST['telmdf'];
              $locationmdf=$_POST['locationmdf'];
              $emailmdf=$_POST['emailmdf'];
              $plusinfomdf=$_POST['plusinfomdf'];
              $keygenerate=generatecode(trim($_POST['nommdf']));
                 
            $t=time();
            $datereel=date("Y-m-d H:i:s",$t);
            $redacteurcode=$_SESSION["email"];
                    // $redacteurcode="gastron@gmail.com";
            echo "key: ".$keygenerate;
            echo "variable: ".$keygenerate.$nommdf.$locationmdf.$telmdf.$emailmdf.$plusinfomdf;






           

                                  $sql="insert into fournisseurdb(code,nom,tel,email,location,plusinfo,matriculredacteur,lastmodification) values (:codeis,:nom,:tel,:email,:location,:plusinfo,:matriculredacteur,:lastmodification)";


              if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":nom", $nommdf, PDO::PARAM_STR);
                      $stmt->bindParam(":tel", $telmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":email", $emailmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":location", $locationmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":plusinfo", $plusinfomdf, PDO::PARAM_STR);
                      $stmt->bindParam(":codeis", $keygenerate, PDO::PARAM_STR);
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
        
function generatecode($codeisthis){
  $codeisthis=$_POST['nommdf'];
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
        echo "i equals 1";
                  

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
           include('../../db/config.php');


  $sql = "SELECT * FROM fournisseurdb WHERE code = :code ";
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
?>


 