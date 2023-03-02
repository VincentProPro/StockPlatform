<?php


// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myJSON = json_encode($myObj);

// echo $myJSON;


require_once "../db/config.php";

 $sql = "SELECT COUNT(cs.codearticle) AS frequence, art.designation, cs.codearticle, cs.code, cs.quantity FROM cmusorti cs LEFT JOIN article art ON cs.codearticle = art.code GROUP BY cs.codearticle";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            // $stmt->bindParam(":idconfirmtimetable", $param_idconfirmtimetable, PDO::PARAM_STR);
            // $stmt->bindParam(":datesession", $datesession, PDO::PARAM_STR);
            
            // // Set parameters
            // $param_idconfirmtimetable = trim($_POST["idconfirmtimetable"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() >0){
                   $arraystable= $stmt->fetchAll();
                    $sessionarray=array();
                   foreach ($arraystable as $row) {
                    //idtimetable,openstatus,starttime,endtime,duration,,idconfirmtimetable,idSession
                    $code=$row['code'];
$designation=$row['designation'];

$frequence=$row['frequence'];


 $tablearrayone=array(
            "code" => $code,
            "designation" => $designation,
            
            "frequence" => $frequence,
            
        );
 array_push($sessionarray, $tablearrayone);

    
}
// http_response_code(205);

    // show products data in json format
                                //echo"hello";

                            //echo $studentarray;
    echo json_encode($sessionarray);
//     $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myJSON = json_encode($myObj);

// echo $myJSON;

                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No confirmedtimetable found with that id.";
                             echo $username_err;

                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);

    unset($pdo);


// Prepare a select statement
        

?>

