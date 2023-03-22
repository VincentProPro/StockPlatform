<?php
error_reporting(0);
// Initialize the session
session_start();
// require("../db/config.php");
require("viewcomptable.php");

                    include('../db/config.php');

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../logout.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
<!-- 	<meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
<link rel="stylesheet" href="../css/style2.css">



</head>
<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic  est une Clinique de réference.</p>
</div>

<!-- <div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>

</div> -->
<?php include("../menu.php"); ?>


<div class="row">
  <div class="leftcolumn">
       <div class="card shadowexempl">
           <center>  <?php 
      if(isset($_COOKIE['messagedisplay'])) : ?>
       

         <div class="alerttext">
          
          <p>
            <?php echo $_COOKIE['messagedisplay']; ?></p>
          </div>
            <?php endif; ?>

          </center>
        <h4>Voir Commandes</h4>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'recent')">Recent</button>
  <button class="tablinks" onclick="openCity(event, 'nonexecuter')">Non Executer</button>
  <button class="tablinks" onclick="openCity(event, 'nonvalider')">Non Valider</button>
  <button class="tablinks" onclick="openCity(event, 'executer')">Executer</button>
  <button class="tablinks" onclick="openCity(event, 'valider')">Valider</button>
</div>

<div id="recent" class="tabcontent">
  <h3>Commandes Récentes</h3>
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandenonvalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>


      </div>

<div id="nonexecuter" class="tabcontent">
  <h3>Comande Non Executer</h3>
  <p>Clicker sur executer pour signaler que la Commande a été faite.</p> 
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandNonExecuter as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
          <form method="POST" action="apicomptable.php">
            <input type="hidden" name="formulaire" value="executer">
            <input type="hidden" name="matricule" value="<?php echo$commande[0]; ?>">
            <button type="submit">Executer</button>
          </form>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>
</div>

<div id="nonvalider" class="tabcontent">
  <h3>Commande Non Valider</h3>
  <p>Cliquer sur Valider pour la validation des commandes</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandenonvalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
           <form method="POST" action="apicomptable.php">
            <input type="hidden" name="formulaire" value="valider">
            <input type="hidden" name="matricule" value="<?php echo$commande[0]; ?>">
            <button type="submit">Valider</button>
          </form>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="valider" class="tabcontent">
  <h3>Commande Valider</h3>
  <p>Commande(s) validée(s) par la comptabe</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandevalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
      }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>

        <?php 
        echo"n result";
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="executer" class="tabcontent">
  <h3>Commande Executer</h3>
  <p>Liste des Commandes Executer</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandExecuter as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>


       
      </div>
   <div class="card shadowexempl">
              <h2>Inventaire stocks Magasin</h2>
              <h5>Comptable Fonction</h5>
              <form  method="POST">
                <div>
                    <label for="codearticl"><b>Code Article</b></label>
                  <input type="text" name="codearticl"> <label for="artcl"><b>Article</b></label>
                  <input type="text" name="artcl"> 
                  </div>
                   
                   <!-- <label for="fourni"><b>Fournisseur </b></label>
              <input type="text" placeholder="Entrer le fournisseur" name="fourni" required> -->

                  <label for="quantite"><b>Quantité réelle</b></label>
                  <input type="number" name="quantite"> 

                   <label for="poids"><b>Poids Réel</b></label>
                  <input type="number" name="poids">
                  <br>
                   
                   <label for="situation"><b>Situation</b></label>
                  <input type="text" name="situation"><label for="period"><b>Période</b></label>
                  <input type="text" name="period">
                  <br>
                  <br>

                  <!-- <label for="comandnum"><b>Numéro Commande</b></label>
              <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
              <label for="facturnum"><b>Numéro Facture</b></label>
              <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required> -->
              <label for="date"><b>Date</b></label>
              <input type="date"  name="date" required>
              <label for="time"><b>Time</b></label>
              <input type="time"  name="time" required>
              <br> <br> 
                        <label for="validation"><b>validation de sortie par le Boss</b></label>


              <input name="validation" type="checkbox" >
                    <button type="submit" name="button1">Envoyé</button>
              </form>

              <p>Autres fonctions...</p>
              <p>Le ou la comptable est chargé de vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
    </div>


      
    <div class="card shadowexempl">
        <h2>Demande De Commande</h2>
        <h5>Besion Clinic</h5>
 
          <div><form  method="POST" action="apicomptable.php">
            <div>
                          <label for="magasin"><b>Magasin </b></label>

               <select name="magasin">

           <?php
   
              // $query=mysqli_query($conn,"select * from `users`");
              $sql = "SELECT DISTINCT nom , code FROM magasintable";
                
                // Set parameters
                // $param_username = trim($_POST["email"]);
            
            if($stmt = $pdo->prepare($sql)){

                
                if($stmt->execute()){
                                            
                    if($stmt->rowCount()>0){
                                          $arrayelement= $stmt->fetchAll();
                                          foreach($arrayelement as $roleelement){
                                            ?> 
                                              <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                            <?php
                                          }  }}}?>
                                            </select><br><br><br>
                                                     <label for="situation"><b>Situation </b></label>

               <select name="situation">

           <?php
   
              // $query=mysqli_query($conn,"select * from `users`");
              $sql = "SELECT DISTINCT nom , code FROM situation";
                
                // Set parameters
                // $param_username = trim($_POST["email"]);
            
            if($stmt = $pdo->prepare($sql)){

                
                if($stmt->execute()){
                                            
                    if($stmt->rowCount()>0){
                                          $arrayelement= $stmt->fetchAll();
                                          foreach($arrayelement as $roleelement){
                                            ?> 
                                              <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                            <?php
                                          }  }}}?>
                                            </select><br><br><br>
                 

              

              <label for="libeller"><b>Libellé </b></label>
              <input type="text" name="libeller"> 

              <label for="description"><b>Description </b></label>
              <input type="text" name="description"> 

              <label for="tarif"><b>Tarif</b></label>
              <input type="text" name="tarif"> 
              </div>



                        <input type="hidden" name="formulaire" value="bondecommande"> 

         
             
             

            

          <br> <br> 
           
          <button type="submit" name="button2">Envoyé</button>
              
            </form></div>
            <p>Autres fonctions..</p>

          <p>Le ou la Comptable est chargé de faire l'inventaire, evaluer les besoins de la clinics. Vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
    </div>
    <div class="card shadowexempl">
        <h2>Archive</h2>
        <h5>Televerser un document de la Clinic</h5>
 
          <div>
          <form method="POST" enctype="multipart/form-data" action="apicomptable.php">
          <input type="text" name="title" required placeholder="Le nom du fichier">
          <input type="text" name="filedescription"  placeholder="La description du fichier">
          <input type="file" name="file">
          <input type="hidden" name="formulaire" value="upload"> 

              <button type="submit" name="submit" value="Upload"> Archiver </button>
          </form>


          </div>
          <h2>Listes Des Documents </h2>
        <h3>Voulez vous rechercher un document?</h3>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for documents.." title="Type in a name">
        <div class="retraitarticleperunit">
          <div class="wrapper">


                <table id="myTable">
                  <tr class="header">
                    <th style="width:40%;">Titre</th>
                    <th style="width:15%;">Description</th>
                    <th style="width:15%;">Lien</th>
                    <th style="width:15%;">Date de Creation</th>
                    <th style="width:15%;">Ajouté par</th>
                  </tr>
                  
                  <?php 
                  foreach($archive as $element){

                    ?>
                    <tr>     
                      <td contentEditable ><?php echo $element["title"]; ?></td>              
                      <td><?php echo $element["description"]; ?></td>                                              
                      <td><button type="submit" onclick="window.open('<?php echo $element["lien"]; ?>')">Download!</button></td>                                              
                      <td><?php echo $element["dateadded"]; ?></td> 
                      <td><?php echo $element["addedby"]; ?></td>                                              
                    </tr>

                    <?php

                  }

                  ?>
                  
                </table>
          </div>

        </div>
            <p>Autres fonctions..</p>

          <p>Le ou la Comptable est chargé de faire l'inventaire, evaluer les besoins de la clinics. Vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
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
    <?php include("../component/role.php"); ?>
     <div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
   // include('../db/config.php');
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
                                      }  }}}
                                          // unset($pdo);
?>
                                        </select><br><br>

        <label>Object:</label>
        <input type="text" name="" placeholder="L'object du sujet">
        
   
        <textarea placeholder="Entrer votre message ici"> Entrer votre message ici</textarea>
              <button type="submit">Envoyé</button>

      </form>
    </div>

    <div class="card">
       <h3>Lire les Messages</h3>
      
      <button >Lire</button>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
<script type="text/javascript" src="../javascript.js"></script>
<script type="text/javascript" >

function myFunction(){
  var input, filter, table, tr, td, i,j, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
    td = tr[i].getElementsByTagName("td")[0];
    td2 = tr[i].getElementsByTagName("td")[1];
    td3 = tr[i].getElementsByTagName("td")[2];
    td4 = tr[i].getElementsByTagName("td")[3];
    td5 = tr[i].getElementsByTagName("td")[4];
    td6 = tr[i].getElementsByTagName("td")[5];
      
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
     
  }
}
</script>
</body>
</html>