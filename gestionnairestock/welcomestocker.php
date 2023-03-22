<?php
error_reporting(0);
ob_start();

// Initialize the session
session_start();

 require("viewgestionnairestock.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
<!-- 	<meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <style type="text/css">
          
#myInput {
  background-image: url('../images/search.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  background-size: 2%;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
        </style>
</head>
<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic  est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>
</div>

 
<?php include("../menu/menugestionairestock.php"); ?>


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
        <div class="tab">
           <button class="tablinks" onclick="openCity(event, 'achatentrernonvalid')">Achat Non Valider</button>
            <button class="tablinks" onclick="openCity(event, 'achatentrervalid')">Achat Valider</button>
             <button class="tablinks" onclick="openCity(event, 'achatcoursiernonvalider')">Achat Coursier Non Valider</button>
            <button class="tablinks" onclick="openCity(event, 'achatcoursiervalider')">Achat Coursier Valider</button>


        </div>


<div id="achatcoursiernonvalider" class="tabcontent">
  <h3>Achat Coursier Non Validé</h3>
  <p>Clicker sur valider pour inserer dans le stock.</p> 
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatCoursiernonValider as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Coursier </h5>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>

          <div class="row">
            <div class="columnfit"><span>Description: </span><span><?php echo$object[7]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Prix Achat: </span><span><?php echo$object[4]; ?> CFA</span></div>

          </div>


          <div class="row">
            <div class="columnfit"><span>Quantity: </span><span><?php echo$object[2]; ?></span></div>
          </div>

           <div class="row">
            <div class="columnfit"><span>Quantité par Unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
                     <div class="row">
            <div class="columnfit"><span>Format: </span><span><?php echo$object[9]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Facture Numero: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Commande: </span><span><?php echo$object[5]; ?></span></div>

          </div>   
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[8]; ?></span></div>

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

<div id="achatentrernonvalid" class="tabcontent">
  <h3>Achat Entrer Non Validé</h3>
      <!--   <p>Rappeler la comptabe pour la validation de ces commandes</p>
       -->   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatentrernonvalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Entrer Non Validé</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$object[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$object[2]; ?> CFA</span></div>
          </div>
           <div class="row">
            <div class="columnfit"><span>Fournisseur: </span><span><?php echo$object[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Facture: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[5]; ?></span></div>

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

<div id="achatentrervalid" class="tabcontent">
  <h3>Achat Entrer Validé </h3>
  <p>Achat Entrer Validé(s) par la surveillante</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatentrervalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Entrer Validé</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$object[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$object[2]; ?> CFA</span></div>
          </div>
           <div class="row">
            <div class="columnfit"><span>Fournisseur: </span><span><?php echo$object[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Facture: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[5]; ?></span></div>

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

<div id="achatcoursiervalider" class="tabcontent">
  <h3>Achat Coursier Validé</h3>
  <p>Liste des Achat Coursier Validé</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatCoursierValider as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Coursier</h5>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>

          <div class="row">
            <div class="columnfit"><span>Description: </span><span><?php echo$object[7]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Prix Achat: </span><span><?php echo$object[4]; ?> CFA</span></div>

          </div>


          <div class="row">
            <div class="columnfit"><span>Quantity: </span><span><?php echo$object[2]; ?></span></div>
          </div>

           <div class="row">
            <div class="columnfit"><span>Quantité par Unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
                     <div class="row">
            <div class="columnfit"><span>Format: </span><span><?php echo$object[9]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Facture Numero: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Commande: </span><span><?php echo$object[5]; ?></span></div>

          </div>   
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[8]; ?></span></div>

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
        <div class="tab">

             <button class="tablinks" onclick="openCity(event, 'sortinonexecuter')">Sorti Non Executer</button>
            <button class="tablinks" onclick="openCity(event, 'sortiexecuter')">Sorti Executer</button>
            <button class="tablinks" onclick="openCity(event, 'sortidetailnonvalid')">Sorti Detail Non Valider</button>
            <button class="tablinks" onclick="openCity(event, 'sortidetailvalid')">Sorti Detail Valider</button>


        </div>


<div id="sortinonexecuter" class="tabcontent">
  <h3>Sorti Non Executer</h3>
  <p>Clicker sur executer pour signaler que la Sortie a été faite.</p> 
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($sortimagasinNonExecuter as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Sortie Non Executée</h5>
         <div class="row">
                <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
              </div>
              <div class="row">
                  <div class="columnfit"><span>Magasin: </span><span><?php echo$object[5]; ?></span></div>

              </div>
              <div class="row">
                <div class="columnfit"><span>Module: </span><span><?php echo$object[4]; ?></span></div>
              </div>
             
              <div  class="row">
                
               <div class="columnfit"><span>Date: </span><span><?php echo$object[3]; ?></span></div>
              </div>
              <div class="row">
                          <div class="columnfit"><span>Statut: </span><span><?php echo$object[2]; ?></span></div>

              </div>
          <form method="POST" action="apigestionnairestock.php">
            <input type="hidden" name="formulaire" value="executer">
            <input type="hidden" name="matricule" value="<?php echo$object[0]; ?>">
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

<div id="sortiexecuter" class="tabcontent">
  <h3>Sortie(s) Executer</h3>
  <p>Liste des Sorties Executer</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($sortimagasinExecuter as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Sortie Executée</h5>
          <div class="row">
                <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
              </div>
              <div class="row">
                  <div class="columnfit"><span>Magasin: </span><span><?php echo$object[5]; ?></span></div>

              </div>
              <div class="row">
                <div class="columnfit"><span>Module: </span><span><?php echo$object[4]; ?></span></div>
              </div>
             
              <div  class="row">
                
               <div class="columnfit"><span>Date: </span><span><?php echo$object[3]; ?></span></div>
              </div>
              <div class="row">
                          <div class="columnfit"><span>Statut: </span><span><?php echo$object[2]; ?></span></div>

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
<div id="sortidetailnonvalid" class="tabcontent">
  <h3>Sortie Detail Magasin Non Validé</h3>
      <!--   <p>Rappeler la comptabe pour la validation de ces commandes</p>
       -->   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($retraitdetailnonvalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Sortie Detail Non Validé</h5>
          <div  class="row">
            
           <div class="columnfit"><span>Libelé: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Quantité: </span><span><?php echo$object[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Qté par unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
         
          
          <div class="row">
                      <div class="columnfit"><span>format: </span><span><?php echo$object[8]; ?></span></div>

          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[7]; ?></span></div>

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

<div id="sortidetailvalid" class="tabcontent">
  <h3>Sortie Detail Magasin Validé </h3>
  <p>Sortie Detail Magasin Validé(s) par la surveillante</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($retraitdetailvalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Sortie Detail Validé</h5>
          <div  class="row">
            
           <div class="columnfit"><span>Libelé: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Quantité: </span><span><?php echo$object[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Qté par unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
         
          
          <div class="row">
                      <div class="columnfit"><span>format: </span><span><?php echo$object[8]; ?></span></div>

          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[7]; ?></span></div>

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
        

      </div>
      <div class="card shadowexempl">
        <h2>Stock Liste</h2>
<h3>Voulez vous rechercher un article?</h3>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div class="wrapper">


<table id="myTable">
  <tr class="header">
    <th style="width:40%;">Article</th>
    <th style="width:10%;">Groupe Code</th>
    <th style="width:10%;">Qtité</th>
    <th style="width:10%;">Qtité Unité</th>
    <th style="width:10%;">Format</th>
    <th style="width:20%;">Magasin</th>
  </tr>
  
  <?php 
  foreach($stockmagasin as $element){

    ?>
    <tr>     
      <td><?php echo $element["designation"]; ?></td>              
      <td><?php echo $element["matricule_article"]; ?></td>                                              
      <td><?php echo $element["quantity"]; ?></td>                                              
      <td><?php echo $element["quantityperunit"]; ?></td> 
      <td><?php echo $element["formatnom"]; ?></td>                                              
      <td><?php echo $element["magazinnom"]; ?></td>                                              
    </tr>

    <?php

  }

  ?>
  
</table>

          

        </div>



    </div>
      <div class="card shadowexempl">
              <div id="entrerarticle">

                  <h2>Entrée d'Article magasin</h2>
                  <h5>Gestionaire de Stock Fonction</h5>
            <!--       <div class="fakeimg" style="height:200px;">Image</div>
             -->
                    <div><form  method="POST" action="apigestionnairestock.php">
                      <div>
                                    <label for="magasin"><b>Magasin </b></label>

                         <select name="magasin">

                     <?php
             
               include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom , matricule FROM magasintable";
                        
                        // Set parameters
                        // $param_username = trim($_POST["email"]);
                    
                    if($stmt = $pdo->prepare($sql)){

                        
                        if($stmt->execute()){
                                                    
                            if($stmt->rowCount()>0){
                                                  $arrayrole= $stmt->fetchAll();
                                                  foreach($arrayrole as $roleelement){
                                                    ?> 
                                                      <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                    <?php
                                                  }  }}}?>
                                                    </select><br><br>
                        <label for="reference"><b>Reference </b></label>
                      <input type="text" name="reference"> 
                      <br>
                      <br>

                      <label for="fournisseur"><b>Fournisseur</b></label>
                      <select name="fournisseur">

                   <?php
           
             include('../db/config.php');
                    // $query=mysqli_query($conn,"select * from `users`");
                    $sql = "SELECT DISTINCT nom , matricule FROM fournisseurdb";
                      
                      // Set parameters
                      // $param_username = trim($_POST["email"]);
                  
                  if($stmt = $pdo->prepare($sql)){

                      
                      if($stmt->execute()){
                                                  
                          if($stmt->rowCount()>0){
                                                $arrayrole= $stmt->fetchAll();
                                                foreach($arrayrole as $roleelement){
                                                  ?> 
                                                    <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                  <?php
                                                }  }}}?>
                                                  </select><br>
                      <br>
                      

                      <label for="libeller"><b>Libellé </b></label>
                      <input type="text" name="libeller" required> <label for="tarif"><b>Tarif</b></label>
                      <input type="text" name="tarif" required> 
                      </div>
                      <br>
                      <br>


                      <label for="comandnum"><b> Commande</b></label>
<!--                   <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
 -->                   
 <select name="comandnum">

                     <?php
             
               include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT libeller , matricule FROM bondecommandedb ORDER  BY timestamp DESC LIMIT 3";
                        
                        // Set parameters
                        // $param_username = trim($_POST["email"]);
                    
                    if($stmt = $pdo->prepare($sql)){

                        
                        if($stmt->execute()){
                                                    
                            if($stmt->rowCount()>0){
                                                  $arrayrole= $stmt->fetchAll();
                                                  foreach($arrayrole as $roleelement){
                                                    ?> 
                                                      <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                    <?php
                                                  }  }}}?>
                                                    </select>
                      <br>
                      <br>
                  <label for="facturnum"><b>Numéro Facture</b></label>
                  <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required>
                       
                     
                      <br>
                      <br>
                      <!--  <label for="datesorti"><b>Date</b></label>
                <input type="date"  name="datesorti" required> -->

                      <!-- <label for="comandnum"><b>Numéro Commande</b></label>
                  <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
                  <label for="facturnum"><b>Numéro Facture</b></label>
                  <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required> -->
                  <input type="hidden" name="formulaire" value="entrerachat">
                  
                            


                 
                   
                  <button type="submit" name="button1">Envoyé</button>
                      
                    </form></div>
                    <p>Autres fonctions..</p>
                  <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
                </div>
    </div>
    
     <div class="card shadowexempl">
            <div id="retraitarticleperunit">

                <h2>Retrait d'Article du Magasin par Unité</h2>
                <h5>Gestionaire de Stock Fonction</h5>

                  <div><form method="POST"  action="apigestionnairestock.php">
                    <div>           

                    <label for="codearticl"><b> Sorti Libellé</b></label>
                    <select name="codesorti">

                   <?php
           
             include('../db/config.php');
                    // $query=mysqli_query($conn,"select * from `users`");
                    $sql = "SELECT DISTINCT libeller , matricule FROM sortimagasin ORDER  BY timestamp DESC LIMIT 5";
                      
                      // Set parameters
                      // $param_username = trim($_POST["email"]);
                  
                  if($stmt = $pdo->prepare($sql)){

                      
                      if($stmt->execute()){
                                                  
                          if($stmt->rowCount()>0){
                                                $arrayrole= $stmt->fetchAll();
                                                foreach($arrayrole as $roleelement){
                                                  ?> 
                                                    <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                  <?php
                                                }  }}}?>
                                                  </select><br>


                    <label for="artcl"><b> Article </b></label><input type="text" name="autocomplete-search" id="autocomplete-search" placeholder="search here...." class="form-control">

                    <label for="quantity"><b>Quantité </b></label><input type="number" name="quantity">
                    <label for="quantityperunit"><b>Quantité per Unit </b></label><input type="number" name="quantityperunit">
                    




                    </div>
                      
                     
                    <label for="format"><b>Format </b></label>

                       <select name="format">

                   <?php
           
             include('../db/config.php');
                    // $query=mysqli_query($conn,"select * from `users`");
                    $sql = "SELECT DISTINCT nom , matricule FROM format";
                      
                      // Set parameters
                      // $param_username = trim($_POST["email"]);
                  
                  if($stmt = $pdo->prepare($sql)){

                      
                      if($stmt->execute()){
                                                  
                          if($stmt->rowCount()>0){
                                                $arrayrole= $stmt->fetchAll();
                                                foreach($arrayrole as $roleelement){
                                                  ?> 
                                                    <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                  <?php
                                                }  }}}?>
                                                  </select> 
                          <label for="magasin"><b>Magasin </b></label>

                         <select name="magasin">

                     <?php
             
               include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom , matricule FROM magasintable";
                        
                        // Set parameters
                        // $param_username = trim($_POST["email"]);
                    
                    if($stmt = $pdo->prepare($sql)){

                        
                        if($stmt->execute()){
                                                    
                            if($stmt->rowCount()>0){
                                                  $arrayrole= $stmt->fetchAll();
                                                  foreach($arrayrole as $roleelement){
                                                    ?> 
                                                      <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                    <?php
                                                  }  }}}?>
                                                    </select><br>
              
                                  <input type="hidden" name="formulaire" value="sortidetail">

                <br> <br> 
                          
                 
                <button type="submit" name="retraituniter">Envoyé</button>
                    
                  </form></div>
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
    <?php include("../component/role.php"); ?>

<div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
   include('db/config.php');
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
<script type="text/javascript" src="../javascript.js"></script>
<script>
function myFunction() {
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
    // if (td1) {
    //   txtValue1 = td1.textContent || td1.innerText;
    //   if (txtValue1.toUpperCase().indexOf(filter) > -1) {
    //     tr[i].style.display = "";
    //   } else {
    //     tr[i].style.display = "none";
    //   }
    // }
    // if (td2) {
    //   txtValue2 = td2.textContent || td.innerText;
    //   if (txtValue2.toUpperCase().indexOf(filter) > -1) {
    //     tr[i].style.display = "";
    //   } else {
    //     tr[i].style.display = "none";
    //   }
    // }
    // if (td3) {
    //   txtValue3 = td3.textContent || td3.innerText;
    //   if (txtValue3.toUpperCase().indexOf(filter) > -1) {
    //     tr[i].style.display = "";
    //   } else {
    //     tr[i].style.display = "none";
    //   }
    // }       
  }
}
</script>
<script type="text/javascript">
  $(function() {
     $( "#autocomplete-search" ).autocomplete({
       source: '../ajax-autocomplete-search-data.php',
     });
  });
</script>
</body>
</html>
<?php
    ob_end_flush(); // Flush the output from the buffer

?>