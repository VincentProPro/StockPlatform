

<?php
       session_start();

require_once "../config.php";

$magasin=$_POST['magasin'];

$libeller=$_POST['libeller'];
$tarif=$_POST['tarif'];
$t=time();
$datereel=date("Y-m-d",$t);
$idtimetable_err='' ;
$comandnum=trim($_POST["comandnum"]);
$redacteurcode=$_SESSION["email"];
 if(empty($comandnum)){
        $idtimetable_err = "Please enter command num.";
        echo $idtimetable_err;
    } else{
        $comandnum = trim($_POST["comandnum"]);
    }

        if(empty($idtimetable_err) ){

            //start
                    $sql = "SELECT * FROM bondecommandedb WHERE code = :comandnum";

                    if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":comandnum", $comandnum, PDO::PARAM_STR);
            
            // Set parameters
            $comandnum = trim($_POST["comandnum"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){


                if($stmt->rowCount() ==0){
                    //let go
                    try{



                        $sql="insert into  bondecommandedb (code,libeller,tarif,magazincode,lastmodification,redacteurcode) values (:comandnum, :libeller, :tarif,:magasin,:lastmodification,:redacteurcode)";

                        if($stmt = $pdo->prepare($sql)){

$stmt->bindParam(":comandnum", $comandnum, PDO::PARAM_STR);

$stmt->bindParam(":libeller", $libeller, PDO::PARAM_STR);
$stmt->bindParam(":tarif", $tarif, PDO::PARAM_STR);
$stmt->bindParam(":magasin", $magasin, PDO::PARAM_STR);
$stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
$stmt->bindParam(":redacteurcode", $redacteurcode, PDO::PARAM_STR);

            
          
           
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){

                        $sql = "SELECT * FROM bondecommandedb WHERE code = :comandnum";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":comandnum", $comandnum, PDO::PARAM_STR);
            
            // Set parameters
            //$idSession = trim($_POST["idSession"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() >0){
                    $arraystable= $stmt->fetchAll();
                        echo "<script>alert('Success!');</script>";

                                    
                                          // http_response_code(205);


                            // show products data in json format
                                                        //echo"hello";

                                                    echo "parfait";
                            //echo json_encode($timetablearray);




                    echo "sup a 0";
                }
                else{
                    echo  "Course add fails ";
                        http_response_code(201);
                        $message="This comandnum has not been added";

                        echo json_encode($message);
                }
            }
            else{
                echo  "Course Add fails ";
                        http_response_code(201);
                        $message="This comandnum has not been added";

                        echo json_encode($message);
            }
            }


                //echo "good good";
            }else{
                echo "canot execute insert";
            }

                        }else{
                            echo " canot insert comandnum";
                        }



                    }catch(exception $e){
    echo"try again".$e;
    

}

                }else{
                    echo  "comandnum Add fails, course code exists ";
                        http_response_code(201);
                        $message="This comandnum has not been added because comandnum code exists already";

                        echo json_encode($message);
                }


            }else{
                echo "something went wrong in execute()";
            }
        }else{
                echo "canot do the stmt = pdo->prepare(sql)something went wrong";
            }
             unset($stmt);
}else{
    echo  "comand Add fails,  code is required ";
                        http_response_code(201);
                        $message="This comand has not been added because  code is required field";

                        echo json_encode($message);
}

    unset($pdo);

?>
