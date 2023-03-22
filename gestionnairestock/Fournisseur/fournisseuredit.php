<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login.php");
    exit;
}
$emailfourni=$_POST['emailfourni'];
$idcode=$_POST['idcode'];
$tel=$_POST['tel'];
$location=$_POST['location'];
$plusinfo=$_POST['plusinfo'];
$nom=$_POST['nom'];
?>
 
<!DOCTYPE html>
<html>
<head>
<!--    <meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../../cliniccss.css">
<!-- //<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
//        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
//        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->

<!-- <link rel="stylesheet"  
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->  
        <style>   
        table {  
            border-collapse: collapse;  
        }  
            .inline{   
                display: inline-block;   
                float: right;   
                margin: 20px 0px;   
            }   
             
            input, button{   
                height: 34px;   
            }   
      
        .pagination {   
            display: inline-block;   
        }   
        .pagination a {   
            font-weight:bold;   
            font-size:18px;   
            color: black;   
            float: left;   
            padding: 8px 16px;   
            text-decoration: none;   
            border:1px solid black;   
        }   
        .pagination a.active {   
                background-color: pink;   
        }   
        .pagination a:hover:not(.active) {   
            background-color: skyblue;   
        }  
        .invisi {
    display: none;
        visibility: hidden;

} 




body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
/*input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

 Set a style for all buttons 
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}*/

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal,.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 80%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 0px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

            </style>  
</head>
<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic  est une Clinique de réference.</p>
</div>

<?php include("../menu/menugestionairestock.php"); ?>


<div class="row">
  <div class="leftcolumn">
      <div class="card shadowexempl">
              <div id="entrerarticle">

                  <h2>Fournisseur Gestion</h2>
                  <h5>Gestionaire de Stock Fonction</h5>
                    <form  action="../apifournisseur.php" method="POST">
   

    <div class="container">
            <h3>Fournisseur Modification</h3>

      <label for="nommdf"><b>Nom Complet</b></label>
      <input type="text" placeholder="Entrer mom" name="nommdf" value="<?php echo $nom; ?>"required>
      <input type="hidden"  name="matricule" value="<?php echo $idcode; ?>">

      <label for="telmdf"><b>Tel</b></label>
      <input type="text" placeholder="Entrer le tel" value="<?php echo $tel;?>" name="telmdf" required>
      <label for="emailmdf"><b>Email</b></label>
      <input type="text" placeholder="Entrer email" name="emailmdf" value="<?php echo $emailfourni;?>">
      <label for="locationmdf"><b>Location</b></label>
      <input type="text" placeholder="Entrer la Position" name="locationmdf" value="<?php echo $location;?> ">
       <label for="plusinfomdf"><b>Plus d'Info</b></label>
       <input type="text" placeholder="Entrer la description" name="plusinfomdf" value="<?php echo $plusinfo;?> ">
       <input type="hidden"  name="formulaire" value="modifier">
      
      <br> <br> 
      
      <button type="submit" name="modify">Envoyé</button>
      
    </div>

    
  </form>

                  
      
     
            
                    
                    <p>Autres fonctions..</p>
                  <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
                </div>
    </div>

  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>Profile </h2>
            <div class="fakeimg" style="height:100px;"><img src="../../images/contact.png" style="height:80px;"></div>
<b>Bonjour Mr <?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
      <br>
      <br>
      <b>role: <?php echo htmlspecialchars($_SESSION["role"]); ?></b>
            <br>
      <b>tel: <?php echo htmlspecialchars($_SESSION["tel"]); ?></b>
        <br>
      <b>email: <?php echo htmlspecialchars($_SESSION["email"]); ?></b>
                  <a href="../../logout.php"><button class="fakeimg" >Log Out</button></a>

    </div>
    <div class="card">
      <h3>Gestionnaire De Stock </h3>
      
      <div class="fakeimg"><p>Le Gestionnaire de stock est chargé de saisir les sorties d'articles, ajouter des articles, fournisseurs et catégories dans la base de donnée.</p></div>
    </div>
<div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
   include('../../db/config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT role FROM users";
            
            // Set parameters
            // $param_username = trim($_POST["email"]);
        
        if($stmt = $pdo->prepare($sql)){

            
            if($stmt->execute()){
                                        
                if($stmt->rowCount()>0){
                                      $arrayrole= $stmt->fetchAll();
                                      foreach($arrayrole as $roleelement){
                                        ?> 
                                          <option value="<?php echo $roleelement[0];?>"><?php echo $roleelement[0];?></option>
                                        <?php
                                      }  }}}?>
                                        </select><br><br>

        <label>Object:</label>
        <input type="text" name="" placeholder="L'object du sujet">
        
   
        <textarea placeholder="Entrer votre message ici"> Entrer votre message ici</textarea>
              <button type="submit">Envoyé</button>

      </form>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>


</body>
</html>
<?php
                    // include('../db/config.php');
// error_reporting(0);

        if(array_key_exists('modify', $_POST)) {
            modifyfunc();
        }
        else if(array_key_exists('button2', $_POST)) {
            
        }
        function modifyfunc() {

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


         include('../../db/config.php');



           $sql="Update  fournisseurdb Set nom=:nommdf, tel=:telmdf, email=:emailmdf, location=:locationmdf, plusinfo=:plusinfomdf, matriculredacteur=:matriculredacteur, lastmodification=:lastmodification WHERE code = :codeis";

              if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":nom", $nommdf, PDO::PARAM_STR);
                      $stmt->bindParam(":tel", $telmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":email", $emailmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":location", $locationmdf, PDO::PARAM_STR);
                      $stmt->bindParam(":plusinfo", $plusinfomdf, PDO::PARAM_STR);
                      $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);
                      $stmt->bindParam(":matriculredacteur", $matriculredacteur, PDO::PARAM_STR);
                      $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                        if($stmt->execute()){
                               echo "<script>alert('Success!');</script>";
                                 header("location: gestionnairestock/fournisseurmanage.php");




                        }}
            echo "This is Button1 that is selected";
        }

?>


 