<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
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

<link rel="stylesheet" href="../../cliniccss.css">
<!-- //<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
//        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
//        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->

<!-- <link rel="stylesheet"  
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  -->  
        <style>   
        /*table {  
            border-collapse: collapse;  
        } */ 
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



  #outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #92CFFE;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0040ff;
  color: white;
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
            require_once "../../conn.php";   
        
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
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Ajouter Un Fournisseur</button>   
            <h1>Liste Des Fournisseurs</h1>   
            <p> Modifier et Supprimer.   
            </p>   

            <table id="customers" class="table table-striped table-condensed    
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
                    <form action="fournisseuredit.php" method="POST"> 
                    <div class="invisi">
                                        <input type="hidden"  name="idcode" value="<?php echo $row["code"]; ?>">
                                        <input type="hidden"  name="nom" value="<?php echo $row["nom"]; ?>">
                                        <input type="hidden"  name="tel" value="<?php echo $row["tel"]; ?>">
                                        <input type="hidden"  name="emailfourni" value="<?php echo $row["email"]; ?>">
                                        <input type="hidden"  name="location" value="<?php echo $row["location"]; ?>">
                                        <input type="hidden"  name="plusinfo" value="<?php echo $row["plusinfo"]; ?>">
</div>
              
<div id="outer">
  <div class="inner"><button type="submit"  >Modifier</button></div>
  <div class="inner"><button type="button" id="<?php echo $row["code"]; ?>" onclick="myFunctionDelete(this.id)">Supprimer</button></div>
 
</div>
</form>

                        
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
 
   include('../../config.php');
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
  
  <form class="modal-content animate" action="apifournisseurajout.php" method="POST">
   

     <div class="container">
            <h3>Fournisseur Ajout</h3>

      <label for="nommdf"><b>Nom Complet</b></label>
      <input type="text" placeholder="Entrer mom" name="nommdf" >

      <label for="telmdf"><b>Tel</b></label>
      <input type="text" placeholder="Entrer le tel"  name="telmdf" >
      <label for="emailmdf"><b>Email</b></label>
      <input type="text" placeholder="Entrer email" name="emailmdf" >
      <label for="locationmdf"><b>Location</b></label>
      <input type="text" placeholder="Entrer la Position" name="locationmdf" >
       <label for="plusinfomdf"><b>Plus d'Info</b></label>
      <input type="text" placeholder="Entrer la description" name="plusinfomdf" >
      
      <br> <br> 
      
      <button type="submit" name="modify">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annulé</button>
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
      <input type="text" placeholder="Entrer l'email" name="email" >

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" >
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" >
        
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



 function myFunctionDelete(elem)   
        {   
          var message=elem;
            // alert(message) ;
            window.location.href = "fournisseurdelete.php?idcodeis="+message;

        } 
</script>
</body>
</html>


 