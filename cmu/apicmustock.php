<?php


// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myJSON = json_encode($myObj);

// echo $myJSON;

// error_reporting(0);

// require_once "../db/config.php";

$ttt=$_GET['perio'];
switch ($ttt) {
        case 'infoget':

        echo"<script>alert('good')</script";
        // code...
          // $sessionarray=infogetexc();
              // echo "good";

     // $ses=array();
     // $ses=infogetexc();
     //           echo json_encode($ses);




        break;
    case 'situationstock':
            echo"<script>alert('good')</script";

        // code...
          // $sessionarray=situationstockexc();
          //     echo json_encode($sessionarray);

     $ses=array();
     $ses=situationstockexc();
               echo json_encode($ses);




        break;
     case 'perioderentabilarticl':
        // code...
          // $sessionarray=situationstockexc();
          //     echo json_encode($sessionarray);

     $ses=array();
     $ses=perioderentabilarticlexc();
               echo json_encode($ses);




        break;
        case 'periodesortiarticle':
        $ses=array();
        $ses=periodesortiarticlexc();
        echo json_encode($ses);
    
    default:
        // code...
        break;
}
 function testhis(){
$sessionarray=array();
     $tablearrayone=array(
            "code" => '7',
            "designation" => "designation",
            
            "quantity" => 8,
            
        );
     $tablearrayone2=array(
            "code" => '8',
            "designation" => "designation8",
            
            "quantity" => 9,
            
        );
 array_push($sessionarray, $tablearrayone);
 array_push($sessionarray, $tablearrayone2);
 return $sessionarray;

 }
 function infogetexc(){
     header("location: cmu/welcomecmu.php ");
                        include "../db/config.php";
                            $artclname=$_GET['artclname'];


                            $sql = "SELECT groupcode FROM article WHERE designation=:designation";

                        
                            if($stmt = $pdo->prepare($sql)){
                                            $stmt->bindParam(":designation", $artclname, PDO::PARAM_STR);


                               
                                if($stmt->execute()){
                                    // Check if username exists, if yes then verify password
                                    if($stmt->rowCount() >0){
                                        $arraystable= $stmt->fetchAll();
                                        $groupcode=$arraystable[0][0];
                                        $sql = "SELECT prixachat, prixvente, taxe FROM cmuentrer  WHERE groupcode_article=:groupcode_article ORDER BY date DESC";

                        
                            if($stmt = $pdo->prepare($sql)){
                                            $stmt->bindParam(":groupcode_article", $groupcode, PDO::PARAM_STR);

                               
                                if($stmt->execute()){
                                    // Check if username exists, if yes then verify password
                                    if($stmt->rowCount() >0){
                                       $arraystable= $stmt->fetchAll();
                                        $sessionarray=array();
                                       foreach ($arraystable as $row) {
                                        $prixachat=$row['prixachat'];
                    $prixvente=$row['prixvente'];

                    $taxe=$row['taxe'];


                     $tablearrayone=array(
                                "prixachat" => $prixachat,
                                "prixvente" => $prixvente,
                                
                                "taxe" => $taxe,
                                
                            );
                     array_push($sessionarray, $tablearrayone);

                        
                    }
                    return $sessionarray;
                       

                                    } else{
                                        // Display an error message if username doesn't exist
                                        $username_err = "Rien a montrer.";
                                                 echo $username_err;

                                    }
                                } else{
                                    echo "Oops! Something went wrong. Please try again later.";
                                }
                            }
                            
                            // Close statement
                            unset($stmt);

                        unset($pdo);





                                    }else{return "none";}
                                }else{return "none";}}else{return "none";}



                        

}

// function situationstockexc(){
//                         include "../db/config.php";

//                         $sql = "SELECT cs.code, art.designation, cs.quantity FROM cmustock cs LEFT JOIN article art ON cs.codearticle =art.code ORDER BY cs.lastmodification DESC";
                            
//                             if($stmt = $pdo->prepare($sql)){
                               
//                                 if($stmt->execute()){
//                                     // Check if username exists, if yes then verify password
//                                     if($stmt->rowCount() >0){
//                                        $arraystable= $stmt->fetchAll();
//                                         $sessionarray=array();
//                                        foreach ($arraystable as $row) {
//                                         $code=$row['code'];
//                     $designation=$row['designation'];

//                     $quantity=$row['quantity'];


//                      $tablearrayone=array(
//                                 "code" => $code,
//                                 "designation" => $designation,
                                
//                                 "quantity" => $quantity,
                                
//                             );
//                      array_push($sessionarray, $tablearrayone);

                        
//                     }
//                     return $sessionarray;
                       

//                                     } else{
//                                         // Display an error message if username doesn't exist
//                                         $username_err = "No confirmedtimetable found with that id.";
//                                                  echo $username_err;

//                                     }
//                                 } else{
//                                     echo "Oops! Something went wrong. Please try again later.";
//                                 }
//                             }
                            
//                             // Close statement
//                             unset($stmt);

//                         unset($pdo);


// }

// function periodesortiarticlexc(){
//     $contentis=$_GET['content'];
//       $splitperiode=explode("|",$contentis);
//       $input1 = $splitperiode[0];
//       $input2 = $splitperiode[1];
// $date = strtotime($input1);
// $date1=date('Y-m-d', $date);
// $date = strtotime($input2);
// $date2=date('Y-m-d', $date);


//                         include "../db/config.php";

//                         // $sql = "SELECT cs.code, art.designation, cs.quantity FROM cmustock cs LEFT JOIN article art ON cs.codearticle =art.code WHERE cs.date BETWEEN '2022-02-09' AND '2022-02-11' ";

//                          $sql = "SELECT cs.code, art.designation, cs.quantity FROM cmustock cs LEFT JOIN article art ON cs.codearticle =art.code WHERE cs.date BETWEEN :date1 AND :date2 ";

                        
//                             if($stmt = $pdo->prepare($sql)){
//                                             $stmt->bindParam(":date1", $date1, PDO::PARAM_STR);
//                                             $stmt->bindParam(":date2", $date2, PDO::PARAM_STR);


                               
//                                 if($stmt->execute()){
//                                     // Check if username exists, if yes then verify password
//                                     if($stmt->rowCount() >0){
//                                        $arraystable= $stmt->fetchAll();
//                                         $sessionarray=array();
//                                        foreach ($arraystable as $row) {
//                                         $code=$row['code'];
//                     $designation=$row['designation'];

//                     $quantity=$row['quantity'];


//                      $tablearrayone=array(
//                                 "code" => $code,
//                                 "designation" => $designation,
                                
//                                 "quantity" => $quantity,
                                
//                             );
//                      array_push($sessionarray, $tablearrayone);

                        
//                     }
//                     return $sessionarray;
                       

//                                     } else{
//                                         // Display an error message if username doesn't exist
//                                         $username_err = "No confirmedtimetable found with that id.";
//                                                  echo $username_err;

//                                     }
//                                 } else{
//                                     echo "Oops! Something went wrong. Please try again later.";
//                                 }
//                             }
                            
//                             // Close statement
//                             unset($stmt);

//                         unset($pdo);


// }



// function perioderentabilarticlexc(){
//     $contentis=$_GET['content'];
//       $splitperiode=explode("|",$contentis);
//       $input1 = $splitperiode[0];
//       $input2 = $splitperiode[1];
// $date = strtotime($input1);
// $date1=date('Y-m-d', $date);
// $date = strtotime($input2);
// $date2=date('Y-m-d', $date);


//                         include "../db/config.php";

//                         // $sql = "SELECT cs.code, art.designation, cs.quantity FROM cmustock cs LEFT JOIN article art ON cs.codearticle =art.code WHERE cs.date BETWEEN '2022-02-09' AND '2022-02-11' ";


//                          // $sql = "SELECT cs.code, art.designation, cs.quantity FROM cmustock cs LEFT JOIN article art ON cs.codearticle =art.code WHERE cs.date BETWEEN :date1 AND :date2 ";
//                          $sql = "SELECT SUM(cs.quantity) AS totalquantity, SUM(cs.benefice) AS totalbenefice, art.designation, cs.codearticle, cs.code FROM cmusorti cs LEFT JOIN article art ON cs.codearticle = art.code   WHERE cs.date BETWEEN :date1 AND :date2 GROUP BY cs.codearticle ORDER BY totalbenefice DESC ";

                        
//                             if($stmt = $pdo->prepare($sql)){
//                                             $stmt->bindParam(":date1", $date1, PDO::PARAM_STR);
//                                             $stmt->bindParam(":date2", $date2, PDO::PARAM_STR);


                               
//                                 if($stmt->execute()){
//                                     // Check if username exists, if yes then verify password
//                                     if($stmt->rowCount() >0){
//                                        $arraystable= $stmt->fetchAll();
//                                         $sessionarray=array();
//                                        foreach ($arraystable as $row) {
//                                         $benefice=$row['totalbenefice'];
//                     $designation=$row['designation'];

//                     $quantity=$row['totalquantity'];


//                      $tablearrayone=array(
//                                  "quantity" => $quantity,
//                                 "benefice" => $benefice,                                
                                
//                                 "designation" => $designation,

                                
//                             );
//                      array_push($sessionarray, $tablearrayone);

                        
//                     }
//                     return $sessionarray;
                       

//                                     } else{
//                                         // Display an error message if username doesn't exist
//                                         $username_err = "No confirmedtimetable found with that id.";
//                                                  echo $username_err;

//                                     }
//                                 } else{
//                                     echo "Oops! Something went wrong. Please try again later.";
//                                 }
//                             }
                            
//                             // Close statement
//                             unset($stmt);

//                         unset($pdo);


// }

 

// Prepare a select statement
        

?>

