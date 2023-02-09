

<?php
       
require_once "config.php";



$email=$_POST['email'];

$pass_word1=$_POST['psw'];

$pass_word=md5($pass_word1);

$idtimetable_err='' ;
 if(empty($email)){
        $idtimetable_err = "Please enter email.";
        echo $idtimetable_err;
    } else{
        $email = trim($_POST["email"]);
    }

        if(empty($idtimetable_err) ){

            //start
                    $sql = "SELECT * FROM users WHERE email = :email ";

                    if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            
            // Set parameters
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){


                if($stmt->rowCount() >0){
                                        $sql = "SELECT * FROM usersloginfo WHERE email = :email ";
                                           if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            
            // Set parameters
            $email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){


                if($stmt->rowCount() == 0){
                    echo"do it";

                     //let go
                    try{



                        $sql="insert into usersloginfo(email,password) values (:email,:password)";

                        if($stmt = $pdo->prepare($sql)){

            
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $pass_word, PDO::PARAM_STR);

            
$email=trim($_POST['email']);
$pass_word1=trim($_POST['psw']);

$pass_word=md5($pass_word1);
            
            
          


            
          
           
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){

                        $sql = "SELECT * FROM usersloginfo WHERE email=:email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            
            // Set parameters
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() >0){
                    $arraystable= $stmt->fetchAll();
                                    
                                             echo "success";
                            $sql = "SELECT * FROM users WHERE email = :email ";

                    if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            
            // Set parameters
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){


                if($stmt->rowCount() >0){
                     $email="";
                     $fullname="";
                     $tel="";
                     $role="";
                    if($row = $stmt->fetch()){
                        $email = $row["email"];
                        $fullname = $row["fullname"];
                        $role = $row["role"];
                        $tel = $row["tel"];
                        $matricule = $row["matricule"];

                    session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["fullname"] = $fullname;
                            $_SESSION["email"] = $email;                            
                            $_SESSION["role"] = $role;                            
                            $_SESSION["tel"] = $tel;                            
                            $_SESSION["matricule"] = $matricule;                            
                            
                            if($role=="SuperAdmin") {
                                // Redirect user to welcome page
                            header("location: welcomesuperAdmin.php");

                            }
                            elseif ($role=="Admin") {
                                                      // code...
                                // Redirect user to welcome page
                            header("location: welcomeadmin.php");
                                                  }  
                            elseif ($role=="Comptable") {
                                                      // code...
                                // Redirect user to welcome page
                            header("location: comptable/welcomecomptable.php");
                                                  }  
                            elseif ($role=="Coursier") {
                            header("location: welcomecoursier.php");
                                                  } 
                            elseif ($role=="Gestionnaire de Stock") {
                            header("location: welcomestocker.php");
                                                  }  
                            elseif ($role=="Gerant CMU") {
                            header("location: welcomecmu.php");
                                                  }                    
                            


                        }

                                        
}
}}
                }
            }
            }


                //echo "good good";
            }else{
                echo "canot execute insert";
                                        http_response_code(201);

            }

                        }else{
                            echo " canot insert user";
                        }



                    }catch(exception $e){
    echo"try again".$e;
                            http_response_code(201);

     $message="Something went wrong try again pleaase ";

                        echo json_encode($message);
    

}


                                       
                    

                }else{
                    echo  "Your Account has been created already ";
                        http_response_code(201);
                        $message="Your Account has been created already ";

                        echo json_encode($message);
                }


            }else{
                echo "something went wrong in execute()";
            }
        }else{
                echo "canot do the stmt = pdo->prepare(sql)something went wrong";
            }

                    //let go
                    

                }else{
                    echo  " email does not  exist ";
                        http_response_code(201);
                        $message=" email is incorrect ";

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
    echo "email is empty";
}

    unset($pdo);

?>
