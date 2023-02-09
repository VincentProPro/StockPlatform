
<?php

        session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../logout.php");
    exit;
}
         include('../../config.php');


              $nom=$_POST['nom'];
              
              $description=$_POST['description'];
              $keygenerate=generatecode(trim($_POST['nom']));
                 
            $t=time();
            $datereel=date("Y-m-d H:i:s",$t);
            $redacteurcode=$_SESSION["email"];
                    // $redacteurcode="gastron@gmail.com";
            echo "key: ".$keygenerate;
            // echo "variable: ".$keygenerate.$nommdf.$locationmdf.$telmdf.$emailmdf.$plusinfomdf;






           

                                  $sql="insert into categoritable(code,nom,description,matriculredacteur,lastmodification) values (:codeis,:nom,:description,:matriculredacteur,:lastmodification)";


              if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":nom", $nom, PDO::PARAM_STR);
                      
                      $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                      $stmt->bindParam(":codeis", $keygenerate, PDO::PARAM_STR);
                      $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);
                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                        if($stmt->execute()){
                               echo "<script>alert('Success!');</script>";
                                 header("location: categorymanage.php");




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
  $codeisthis=$_POST['nom'];
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
           include('../../config.php');


  $sql = "SELECT * FROM categoritable WHERE code = :code ";
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


 