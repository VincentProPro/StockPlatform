<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
<!--    <meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
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
  <h1>Clinic St Vincent d'Afrique</h1>
  <p>La Clinic St Vincent d'Afrique est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>
<!--   <a href="#" style="float:right">Link</a>
 -->
</div>

<div class="navbar">
    <a href="welcomestocker.php#entrerarticle">Entrer Magasin</a>
    <a href="welcomestocker.php#retraitarticle">Retrait Magasin</a>
    <a href="welcomestocker.php#retraitarticleperunit">Retrait Détailé Magasin</a>
    <a href="validationentrer.php">Validation d'Entrer Magasin</a>

 
   

   <div class="dropdown">
    <button class="dropbtn">Transfert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id07').style.display='block'">A Destination d'un autre magasin</a>
      <a href="#"onclick="document.getElementById('id08').style.display='block'">En Provenance d'un autre magasin<</a>
    </div>
  </div> 
 
    <div class="dropdown">
    <button class="dropbtn">Fournisseur 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id16').style.display='block'">Ajouter </a>
      <a href="#"onclick="document.getElementById('id017').style.display='block'">Modifier</a>
      <a href="#"onclick="document.getElementById('id018').style.display='block'">Supprimer</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Article 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id19').style.display='block'">Ajouter </a>
      <a href="#"onclick="document.getElementById('id020').style.display='block'">Modifier</a>
      <a href="#"onclick="document.getElementById('id021').style.display='block'">Supprimer</a>
    </div>
  </div> 
    <div class="dropdown">
    <button class="dropbtn">Catégorie 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id022').style.display='block'">Voir </a>
      <a href="#"onclick="document.getElementById('id023').style.display='block'">Ajouter </a>
      <a href="#" onclick="document.getElementById('id024').style.display='block'" >Modifier </a>
      <a href="#">Supprimer </a>
    </div>
  </div> 
 
</div>

<div class="row">
  <div class="leftcolumn">
      <div class="card shadowexempl">
              <div id="entrerarticle">

                  <h2>Fournisseur Gestion</h2>
                  <h5>Gestionaire de Stock Fonction</h5>

                   <center>  
        <?php  
          
        // Import the file where we defined the connection to Database.     
            require_once "../conn.php";   
        
            $per_page_record = 4;  // Number of entries to show in a page.   
            // Look for a GET variable page if not found default is 1.        
            if (isset($_GET["page"])) {    
                $page  = $_GET["page"];    
            }    
            else {    
              $page=1;    
            }    
        
            $start_from = ($page-1) * $per_page_record;     
        
            $query = "SELECT code, nom, tel, email, location, plusinfo FROM fournisseurdb  LIMIT $start_from, $per_page_record";     
            $rs_result = mysqli_query ($con, $query);    
        ?>    
      
        <div class="container">   
          <br>   
          <div>
          <button>Ajouter Un Fournisseur</button>   
            <h1>Liste Des Fournisseurs</h1>   
            <p> Modifier et Supprimer.   
            </p>   

            <table class="table table-striped table-condensed    
                                              table-bordered">   
              <thead>   
                <tr>   
                  <th width="10%">code</th>   
                  <th width="10%">nom</th>   
                  <th>tel</th>   
                  <th>email</th>   
                  <th>location</th>   
                  <th>plus d'info</th>   
                  <th></th>   
                </tr>   
              </thead>   
              <tbody>   
        <?php     
                while ($row = mysqli_fetch_array($rs_result)) {    
                      // Display each field of the records.    
                ?>     
                <tr>     
                 <td><?php echo $row["code"]; ?></td>     
                     
                <td><?php echo $row["nom"]; ?></td>   
                <td><?php echo $row["tel"]; ?></td>   
                <td><?php echo $row["email"]; ?></td>   
                <td><?php echo $row["location"]; ?></td>                                           
                <td><?php echo $row["plusinfo"]; ?></td>                                           
                <td>
                    <!-- <form > 
                    <div class="invisi">
                                        <input type="hidden"  name="idcode" value="<?php echo $row["code"]; ?>">
</div>
                    <div>
                        <input type="submit" name="modifierr" id="<?php echo $row["code"]; ?>" value="Modifier" onclick="document.getElementById('id01').style.display='block'">
                        <input type="submit" name="supprimer" id="<?php echo $row["code"]; ?>" value="Supprimer">

                        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Modifier</button>

                        <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Supprimer</button>

</div></form> -->
<div>
                        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Modifier</button>

                        <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Supprimer</button></div>
                </td>                                           
                </tr>     
                <?php     
                    };    
                ?>     
              </tbody>   
            </table>   
      
         <div class="pagination">    
          <?php  
            $query = "SELECT COUNT(*) FROM fournisseurdb";     
            $rs_result = mysqli_query($con, $query);     
            $row = mysqli_fetch_row($rs_result);     
            $total_records = $row[0];     
              
        echo "</br>";     
            // Number of pages required.   
            $total_pages = ceil($total_records / $per_page_record);     
            $pagLink = "";       
          
            if($page>=2){   
                echo "<a href='fournisseurmanage.php?page=".($page-1)."'>  Prev </a>";   
            }       
                       
            for ($i=1; $i<=$total_pages; $i++) {   
              if ($i == $page) {   
                  $pagLink .= "<a class = 'active' href='fournisseurmanage.php?page="  
                                                    .$i."'>".$i." </a>";   
              }               
              else  {   
                  $pagLink .= "<a href='fournisseurmanage.php?page=".$i."'>   
                                                    ".$i." </a>";     
              }   
            };     
            echo $pagLink;   
      
            if($page<$total_pages){   
                echo "<a href='fournisseurmanage.php?page=".($page+1)."'>  Next </a>";   
            }   
      
          ?>    
          </div>  
      
      
          <div class="inline">   
          <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
          placeholder="<?php echo $page."/".$total_pages; ?>" required>   
          <button onClick="go2Page();">Go</button>   
         </div>    
        </div>   
      </div>  

    </center>   
      
      <?php
       if(array_key_exists('modifier', $_POST)) {
            updateadd();
        }
function updateadd(){
    $validationstockerdefaut=false;
                $codeis=$_POST['idcode'];
                 $codearticle="";
            $poids="";
            $quantity=0;
            $t=time();
            $datereel=date("Y-m-d H:i:s",$t);
                    $redacteurcode="gastron@gmail.com";


    $validationstocker=true;
         include('../config.php');



    $sql = "SELECT code FROM achatcoursier WHERE code = :code AND validationstocker=:validationstocker";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);
                                           $stmt->bindParam(":validationstocker", $validationstockerdefaut, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                        $sql="Update  achatcoursier Set validationstocker=:validationstocker WHERE code = :code";

              if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":validationstocker", $validationstocker, PDO::PARAM_STR);
                      $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);
                        if($stmt->execute()){
                            $sql = "SELECT codearticle, poids,quantity FROM achatcoursier WHERE code = :code";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                    $arraystable= $stmt->fetchAll();
                                                    $codearticle=$arraystable[0][0];
                                                    $poids=$arraystable[0][1];
                                                    $quantity=$arraystable[0][2];
                                                }}}
                            $sql = "SELECT * FROM stocktable WHERE codearticle = :codearticle";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                    $arraystable= $stmt->fetchAll();
                                                    $previousqtity=$arraystable[0][1];
                                                    $reelqty=$previousqtity+$quantity;
                                                    $sql="Update  stocktable Set quantity=:quantity WHERE codearticle = :codearticle";

                                                        if($stmt = $pdo->prepare($sql)){
                                                           $stmt->bindParam(":quantity", $reelqty, PDO::PARAM_STR);
                                                               $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);

                                                                if($stmt->execute()){
                                                                  echo "<script>alert('Success Update  stocktable!');
                                                                         location.reload();

                                                                  </script>";
                                                                  header("Refresh:0");
                                                                                                                                              }}
                                                                                                                                                 }
                                                                else{

                                                                    $sql="insert into  stocktable (codearticle,quantity,lastmodification,matriculredacteur) values (:codearticle,:quantity,:lastmodification,:matriculredacteur)";
                                                                                                                                                     if($stmt = $pdo->prepare($sql)){

                                                                                                                                                $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);
                                                                                                                                                
                                                                                                                                                $total=$quantity;

                                                                                                                                                $stmt->bindParam(":quantity", $total, PDO::PARAM_STR);
                                                                                                        
                                                                                                        $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                                                                        $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);

                                                                                                                                                if($stmt->execute()){

                                                                                                                                                    $sql = "SELECT * FROM stocktable WHERE codearticle = :codearticle";
                                                                                                          
                                                                                                                      if($stmt = $pdo->prepare($sql)){
                                                                                                                          // Bind variables to the prepared statement as parameters
                                                                                                                          $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);
                                                                
                                                                                                                                  // Set parameters
                                                                                                                                  //$idSession = trim($_POST["idSession"]);
                                                                                                                                  
                                                                                                                                  // Attempt to execute the prepared statement
                                                                                                                                  if($stmt->execute()){
                                                                                                                                      // Check if username exists, if yes then verify password
                                                                                                                                      if($stmt->rowCount() >0){
                                                                                                                                          $arraystable= $stmt->fetchAll();
                                                                                                                                              echo "<script>alert('Successinsert into  stocktable !');

                                                                                                                                              
                                                                                                                                              </script>";
                                                                                                                                              // header("Refresh:0");
                                                                                                                                            }}}
                                                                                                                                                }}

                                                                                                                                                 }



                                                                                                                                             }}
                                                        // $message="operation a reussie";
                                                        // echo "<script>alert('Loperation a reussie !');</script>";



                        }
                        else{
                            $message="operation a echouer";

                        }}

                                                    }else{
                                                        echo "<script>alert('Deja valider !');
                                                                         location.reload();

                                                                  </script>";


                                                    }}}
           
     
                        

  
}
?>
            
                    
                    <p>Autres fonctions..</p>
                  <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
                </div>
    </div>

  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>Profile </h2>
            <div class="fakeimg" style="height:100px;"><img src="../images/contact.png" style="height:80px;"></div>
<b>Bonjour Mr <?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
      <br>
      <br>
      <b>role: <?php echo htmlspecialchars($_SESSION["role"]); ?></b>
            <br>
      <b>tel: <?php echo htmlspecialchars($_SESSION["tel"]); ?></b>
        <br>
      <b>email: <?php echo htmlspecialchars($_SESSION["email"]); ?></b>
                  <a href="../logout.php"><button class="fakeimg" >Log Out</button></a>

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
 
   include('../config.php');
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
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="loginmember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/1550389719.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
            <h3>Se Connecter</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> se Souvenir
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annulé</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal2">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/1550389719.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <h3>S'Inscrire</h3>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> se Souvenir
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>
<script>
    function go2Page()   
        {   
            var page = document.getElementById("page").value;   
            page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
            window.location.href = 'fournisseurmanage.php?page='+page;   
        }  



// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it

window.onclick = function(event) {
    
     if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>


 