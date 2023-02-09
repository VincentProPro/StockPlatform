<?php
/*$user_name=$_POST['username'];
$user_pass=$_POST['password'];
//$loginkeeping=$_POST['loginkeeping'];



//connection to database
/*$conn=new mysqli('localhost','root','','afria1county');
if($conn->connect_error){
    die('connection Failed : '.$conn->connect_error);
}else{
                    $mysql_qry1="select username, email from users where username like '$user_name' and password like '$user_pass'";
                    $mysql_qry2="select username, email from users where email like '$user_name' and password like '$user_pass'";
                    $result=mysqli_query($mysql_qry1);
            if (mysqli_num_rows($result)==0){
            
                    $result=mysqli_query($mysql_qry2);
                    if(mysqli_num_rows($result)==0){
                        echo "login not success ";
                    }
                    else{
                        echo "login success !!! welcome";
                    }

            } 
            else{
                    echo "login success !!! welcome";
            }
        }
*/
        
require_once "config.php";
$email ="";
 $password = "";
$username_err = "";
$password_err = "";
$idNumber_err = "";

$essaieempty=trim($_POST["email"]);
 if(empty($essaieempty)){
        $username_err = "Please enter email.";
        echo $username_err;
    } else{
        $email = trim($_POST["email"]);
    }


    
    // Check if password is empty
    $essaieempty=trim($_POST["psw"]);

    if(empty($essaieempty)){
        $password_err = "Please enter your password.";
         echo $password_err;
    } else{
 $pass_word1=trim($_POST["psw"]);
        $password=md5($pass_word1);
           }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT  email, password FROM usersloginfo WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                       // $verify=password_verify($password, $hashed_password);
                        if($hashed_password===$password){
                            // Password is correct, so start a new session
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
                     $matricule="";
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
                            header("location: coursier/welcomecoursier.php");
                                                  } 
                            elseif ($role=="Gestionnaire de Stock") {
                            header("location: gestionnairestock/welcomestocker.php");
                                                  }                    
                            
                            
                        }

                                        
}
}}
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                                     echo $password_err;

                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that email.";
                             echo $username_err;

                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
?>
