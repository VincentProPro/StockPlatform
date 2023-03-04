<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login.php");
    exit;
}


$matricule=$_POST['matricule'];
$groupcode=$_POST['groupcode'];
$designation=$_POST['designation'];
$prixachat=$_POST['prixachat'];
$prixvente=$_POST['prixvente'];
$category=$_POST['category'];
$quantity_per_unit=$_POST['quantity_per_unit'];
$description=$_POST['description'];
$poids_kg=$_POST['poidsenkg'];
$format=$_POST['format'];
$tmc=$_POST['tmc'];
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
  <h1>Clinic</h1>
  <p>La Clinic  est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>
<!--   <a href="#" style="float:right">Link</a>
 -->
</div>

<div class="navbar">
    <a href="../welcomestocker.php#entrerarticle">Entrer Magasin</a>
    <a href="../welcomestocker.php#retraitarticle">Retrait Magasin</a>
    <a href="../welcomestocker.php#retraitarticleperunit">Retrait Détailé Magasin</a>
    <a href="../validationentrer.php">Validation d'Entrer Magasin</a>

 
   

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
  <div class="dropdown">
        <button class="dropbtn">Format 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../Format/formatmanage.php">Ajouter </a>
          <a href="../Format/formatmanage.php">Modifier</a>
          <a href="../Format/formatmanage.php">Supprimer</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Situation 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../Situation/situationmanage.php">Ajouter </a>
          <a href="../Situation/situationmanage.php">Modifier</a>
          <a href="../Situation/situationmanage.php">Supprimer</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Lieu 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../Lieu/lieumanage.php">Ajouter </a>
          <a href="../Lieu/lieumanage.php">Modifier</a>
          <a href="../Lieu/lieumanage.php">Supprimer</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Module 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="../Module/modulemanage.php">Ajouter </a>
          <a href="../Module/modulemanage.php">Modifier</a>
          <a href="../Module/modulemanage.php">Supprimer</a>
        </div>
      </div>  
</div>

<div class="row">
  <div class="leftcolumn">
      <div class="card shadowexempl">
              <div id="entrerarticle">

                  <h2>Fournisseur Gestion</h2>
                  <h5>Gestionaire de Stock Fonction</h5>
                    <form  action="../apiarticle.php" method="POST">
   

    <div class="container">
            <h3>Fournisseur Modification</h3>

            <label for="designation"><b>Nom Complet</b></label>
      <input type="text" placeholder="Entrer le nom de l'article" name="designation"  value="<?php echo $designation;?> " >
      <label for="telmdf"><b>Description</b></label>
      <input type="text" placeholder="Entrer la description du produit"  name="description"  value="<?php echo $description;?> " >
      <label for="poids_kg"><b>Poids en Kg</b></label>
      <input type="number"  name="poids_kg"  value="<?php echo$poids_kg;?>">
      <label for="tmc"><b>TMC</b></label>
      <input type="number"  name="tmc"  value="<?php echo$tmc;?>">
      <label for="format"><b>Format </b></label>

      <select name="format">
                  <?php
                      include('../../db/config.php');
                      $sql = "SELECT DISTINCT nom , matricule FROM format";
                      if($stmt = $pdo->prepare($sql)){
                        if($stmt->execute()){
                            if($stmt->rowCount()>0){
                                $arrayrole= $stmt->fetchAll();
                                foreach($arrayrole as $roleelement){
                                  ?> 
                                    <option value="<?php echo $roleelement[1];?>">
                                      <?php echo $roleelement[0];?>
                                    </option>
                                  <?php
                                }  
                            }
                          }
                        }
                    ?>
      </select>
      <label for="quantity_per_unit"><b>Quantité par Unité</b></label>
      <input type="number"  name="quantity_per_unit"  value="<?php echo$quantity_per_unit;?>">
      <label for="prixachat"><b>Prix Achat </b></label>
      <input type="number"  name="prixachat"  value="<?php echo$prixachat;?>">
      <label for="prixvente"><b>Prix Vente </b></label>
      <input type="number"  name="prixvente"  value="<?php echo$prixvente;?>">

                                                    <br><br>
      <label for="category"><b>Categorie </b></label>

      <select name="category">
                  <?php
                      include('../../db/config.php');
                      $sql = "SELECT DISTINCT nom , code FROM categoritable";
                      if($stmt = $pdo->prepare($sql)){
                        if($stmt->execute()){
                            if($stmt->rowCount()>0){
                                $arrayrole= $stmt->fetchAll();
                                foreach($arrayrole as $roleelement){
                                  ?> 
                                    <option value="<?php echo $roleelement[1];?>">
                                      <?php echo $roleelement[0];?>
                                    </option>
                                  <?php
                                }  
                            }
                          }
                        }
                    ?>
      </select>               
                                                  <br><br>
       <label>Mode</label>
       <br>
      <select name="modeuse">
        <option value="Voie Orale">Voie Orale</option>
        <option value="Injectable">Injectable</option>
        <option value="Seringle">Seringle</option>
                      </select>
      <br> <br> 
      
      <input type="hidden" name="groupcode" value="<?php echo$groupcode;?>" >      
      <input type="hidden" name="matricule" value="<?php echo$matricule;?>" >      
      <input type="hidden" name="formulaire" value="modifier" >      
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



 