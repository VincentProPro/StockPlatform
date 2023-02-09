

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>

<!-- 	<meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="cliniccss.css">
<link rel="stylesheet" href="css/style2.css">


</head>
<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>
<!--   <a href="#" style="float:right">Link</a>
 -->
</div>
<div class="navbar">
  <a href="#news" onclick="document.getElementById('id01').style.display='block'">Prévision Consommation</a>
 
   <div class="dropdown">
    <button class="dropbtn">Entrée 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id02').style.display='block'">Entrée d'achats </a>
      <a href="#"onclick="document.getElementById('id03').style.display='block'">Entrée de production</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Sortie 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id04').style.display='block'">Consommation Interne</a>
      <a href="#"onclick="document.getElementById('id05').style.display='block'">Déstockage pour livraisons-clients</a>
      <a href="#"onclick="document.getElementById('id06').style.display='block'">Pertes et Avaries et péremption</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Transfert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">A Destination d'un autre magasin</a>
      <a href="#"onclick="document.getElementById('id08').style.display='block'">En Provenance d'un autre magasin<</a>
    </div>
  </div> 


   <div class="dropdown">
    <button class="dropbtn">CMU 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="cmu/welcomecmu.php#entrerarticle">Entrer CMU</a>
      <a href="cmu/welcomecmu.php#retraitarticle">Sorti CMU</a>
    </div>
  </div> 

   <div class="dropdown">
    <button class="dropbtn">Gestionnaire De Stock 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="gestionnairestock/welcomestocker.php#entrerarticle">Entrer Maga</a>
      <a href="gestionnairestock/welcomestocker.php#retraitarticle">Sorti Maga</a>
    </div>
  </div> 


  <div class="dropdown">
    <button class="dropbtn">Magasin 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id09').style.display='block'">Reports et Stock </a>
      <a href="#"onclick="document.getElementById('id010').style.display='block'">Inventaires</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Fournisseur 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
           <a href="gestionnairestock/Fournisseur/fournisseurmanage.php">Ajouter </a>
      <a href="gestionnairestock/Fournisseur/fournisseurmanage.php">Modifier</a>
      <a href="gestionnairestock/Fournisseur/fournisseurmanage.php">Supprimer</a>
    </div>
  </div> 
    <div class="dropdown">
    <button class="dropbtn">Article 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="gestionnairestock/Article/articlemanage.php">Ajouter </a>
      <a href="gestionnairestock/Article/articlemanage.php">Modifier</a>
      <a href="gestionnairestock/Article/articlemanage.php">Supprimer</a>
    </div>
  </div> 
    <div class="dropdown">
    <button class="dropbtn">Catégorie 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="gestionnairestock/Category/categorymanage.php">Voir </a>
      <a href="gestionnairestock/Category/categorymanage.php">Ajouter </a>
      <a href="gestionnairestock/Category/categorymanage.php">Modifier </a>
      <a href="gestionnairestock/Category/categorymanage.php">Supprimer </a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Membre 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id011').style.display='block'">Voir </a>
      <a href="#"onclick="document.getElementById('id012').style.display='block'">Ajouter </a>
      <a href="#" onclick="document.getElementById('id013').style.display='block'" >Modifier </a>
      <a href="#">Supprimer </a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Statistic 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#" onclick="document.getElementById('id014').style.display='block'">Statistic Génerale </a>
      <a href="#"onclick="document.getElementById('id015').style.display='block'">Statistic Magasin </a>
    </div>
  </div> 
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card shadowexempl">
      <h2>Stock Management Interface</h2>
      <h5>Interface web de gestion des stocks</h5>
      <div class="fakeimg" style="height:auto;"><img src="images/gestionstock1.png" style="width:90%;height:250px;"></div>
      <p>Super Admin.</p>
      <p>Le super Admin supervise le système tout entier, assure le bon fonctionnement du système d</p>
    </div>
    <div class="card shadowexempl">
      <h2>Coursier Function</h2>
      <h5>Insertion de Données </h5>
<!--       <div class="fakeimg" style="height:200px;">Image</div>
 -->
        <div><form action="coursierinsertachat.php" method="POST">
          <div>
            <label for="codearticl"><b>Code Article</b></label>
          <input type="text" name="codearticl"> <label for="artcl"><b>Article</b></label>
          <input type="text" name="artcl"> 
          </div>
           
        <label for="magasin"><b>Fournisseur </b></label>

             <select name="fourni">

         <?php
 
   include('config.php');
         try{
           // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT nom , matricule FROM fournisseurdb";
            
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
                                      }  }}}
         }catch(Exception $e){
          ?>
<option value="error"><?php echo $e;?></option>
          <?php

         }

                                      ?>
                                        </select>

          <label for="quantite"><b>Quantité</b></label>
          <input type="number" name="quantite"> 

           <label for="poids"><b>Poids</b></label>
          <input type="number" name="poids">
          
           <label for="format"><b>Format </b></label>

             <select name="format">

         <?php
 
   include('config.php');
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
                                        </select><br>
          <br>

          <label for="comandnum"><b>Numéro Commande</b></label>
      <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
      <label for="facturnum"><b>Numéro Facture</b></label>
      <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required>
      <label for="date"><b>Date</b></label>
      <input type="date"  name="date" required>
      <br> <br> 
                <label for="validation"><b>validation de l'achat par la comptable</b></label>

      <input name="validation" type="checkbox" ><label for="validation"><b>validation de l'achat par le gestionnaire de stock</b></label>

      <input name="validation" type="checkbox" >

      <br> <br> 
       
      <button type="submit">Envoyé</button>
          
        </form></div>
        <p>Autres fonctions..</p>
      <p>Le Cousier n'a aucune autre fonction.</p>
    </div>


    <div class="card shadowexempl">
                  <h2>Gestionaire de Stock Fonction</h2>
                  <h5>Entrée d'Article magasin</h5>
            <!--       <div class="fakeimg" style="height:200px;">Image</div>
             -->
                    <div><form action="coursierinsertachat.php" method="POST">
                      <div>
                                    <label for="magasin"><b>Magasin </b></label>

                         <select name="magasin">

                     <?php
             
               include('config.php');
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
                                                    </select><br><br><br>
                        <label for="codearticl"><b>Reference </b></label>
                      <input type="text" name="codearticl"> 

                      <label for="artcl"><b>Fournisseur</b></label>
                      <input type="text" name="artcl"> 

                      <label for="codearticl"><b>Libellé </b></label>
                      <input type="text" name="codearticl"> <label for="artcl"><b>Tarif</b></label>
                      <input type="text" name="artcl"> 
                      </div>


                      <label for="comandnum"><b>Numéro Commande</b></label>
                  <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
                  <label for="facturnum"><b>Numéro Facture</b></label>
                  <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required>
                       
                     
                      <br>
                      <br>

                      <!-- <label for="comandnum"><b>Numéro Commande</b></label>
                  <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
                  <label for="facturnum"><b>Numéro Facture</b></label>
                  <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required> -->
                  <label for="date"><b>Date</b></label>
                  <input type="date"  name="date" required>
                  <label for="date"><b>Heure</b></label>
                  <input type="date"  name="date" required>
                  <br> <br> 
                            <label for="validation"><b>validation de l'entrée par la comptable</b></label>

                  <input name="validation" type="checkbox" >


                  <br> <br> 
                   
                  <button type="submit">Envoyé</button>
                      
                    </form></div>
                    <p>Autres fonctions..</p>
                  <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
    </div>
    <div class="card shadowexempl">
                  <h2>Gestionaire de Stock Fonction</h2>
                  <h5>Retrait d'Article magasin</h5>

                    <div><form action="coursierinsertachat.php" method="POST">
                      <div>
                         <label for="magasin"><b>Magasin </b></label>

                         <select name="magasin">

                     <?php
             
                        include('config.php');
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
                                                    </select><br><br><br>
                       

                      <label for="codearticl"><b>Libellé </b></label>
                      <input type="text" name="codearticl"> <label for="artcl"><b>Module</b></label>
                      <select name="magasin">

                     <?php
             
                      include('config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom , matricule FROM module";
                        
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




                      </div>
                        
                       
                       <!-- <label for="fourni"><b>Fournisseur </b></label>
                  <input type="text" placeholder="Entrer le fournisseur" name="fourni" required> -->

                    

                      <!-- <label for="comandnum"><b>Numéro Commande</b></label>
                  <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
                  <label for="facturnum"><b>Numéro Facture</b></label>
                  <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required> -->
                  <label for="date"><b>Date</b></label>
                  <input type="date"  name="date" required>
                  <br> <br> 
                            <label for="validation"><b>validation de sortie par la comptable</b></label>

                  <input name="validation" type="checkbox" >
                  <br> <br> 
                   
                  <button type="submit">Envoyé</button>
                      
                    </form></div>
                    <p>Autres fonctions..</p>
                  <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories et articles.</p>
    </div>
     <div class="card shadowexempl">
                <h2>Gestionaire de Stock Fonction</h2>
                <h5> Retrait d'Article du Magasin par Unité</h5>

                  <div><form action="coursierinsertachat.php" method="POST">
                    <div>           

                    <label for="codearticl"><b>Code Sorti </b></label>
                    <input type="text" name="codearticl"> <label for="artcl"><b>Code Article </b></label><input type="text" name="codearticl">

                    <label for="artcl"><b>Quantité </b></label><input type="text" name="codearticl">
                    




                    </div>
                      
                     
                    <label for="format"><b>Format </b></label>

                       <select name="format">

                   <?php
           
             include('config.php');
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
                                                  </select><br>
                <label for="date"><b>Date</b></label>
                <input type="date"  name="date" required>
                <br> <br> 
                          <label for="validation"><b>validation de sortie par la comptable</b></label>

                <input name="validation" type="checkbox" >
                <br> <br> 
                 
                <button type="submit">Envoyé</button>
                    
                  </form></div>
                  <p>Autres fonctions..</p>
                <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
    </div>

     
<!--     debut
 -->


    <div class="card shadowexempl">
      <h2>Gérant CMU Function</h2>
      <h5>Entré Medicament CMU</h5>
<!--       <div class="fakeimg" style="height:200px;">Image</div>
 -->
        <div><form action="coursierinsertachat.php" method="POST">
          <div>
            <label for="codearticl"><b>Code Sorti Magasin</b></label>
          <input type="text" name="codearticl"> <label for="artcl"><b>Code Article</b></label>
          <input type="text" name="artcl"> 
          </div>

           
           <label for="magasin"><b>Situation Du Produit </b></label> <select name="format">

         <?php
 
   include('config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT nom , matricule FROM situation where code='CMU01' ";
            
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

          <label for="quantite"><b>Quantité par Unité</b></label>
          <input type="number" name="quantite"> 

           <label for="poids"><b>Prix d'Achat</b></label>
          <input type="number" name="poids" placeholder="Auto Génerer">
          <label for="poids"><b>Taxe</b></label>
          <input type="number" name="poids" placeholder="Auto Génerer">
          <label for="poids"><b>Prix Vente</b></label>
          <input type="number" name="poids" placeholder="Auto Génerer">
          <br>
          <br>

          
      <label for="date"><b>Date</b></label>
      <input type="date"  name="date" required>
      <br> <br> 
                <label for="validation"><b>validation de sorti par la ou le Gestionnaire de Stock</b></label>

      <input name="validation" type="checkbox" >
      

      <br> <br> 
       
      <button type="submit">Envoyé</button>
          
        </form></div>
        <p>Autres fonctions..</p>
      <p>Le Gérant n'a aucune autre fonction.</p>
    </div>
<!--  fin
 -->
  <div class="card shadowexempl">
      <h2>Gérant CMU Function</h2>
      <h5>Sorti Medicament CMU</h5>
<!--       <div class="fakeimg" style="height:200px;">Image</div>
 -->
        <div><form action="coursierinsertachat.php" method="POST">
          <div>
             <label for="artcl"><b>Code Article</b></label>
          <input type="text" name="artcl"> 
          </div>

           
           <label for="magasin"><b>Situation Du Produit </b></label> <select name="format">

         <?php
 
   include('config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT nom , matricule FROM situation where code='CMU01' ";
            
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

          <label for="quantite"><b>Quantité par Unité</b></label>
          <input type="number" name="quantite"> 

         

          
      <label for="date"><b>Date</b></label>
      <input type="date"  name="date" required>
      <br> <br> 
      

      <br> <br> 
       
      <button type="submit">Envoyé</button>
          
        </form></div>
        <p>Autres fonctions..</p>
      <p>Le Gérant n'a aucune autre fonction.</p>
    </div>

    <div class="card shadowexempl">
      <h2>Gérant Fonction</h2>
      <h5>Inventaire pharmacie </h5>
      <form action="coursierinsertachat.php" method="POST">
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
              
            <button type="submit">Envoyé</button>
      </form>

      <p>Autres fonctions...</p>
      <p>Le ou la Gérant(e) est chargé les saisis entrées et sorties d'articles, produire l'inventaire.</p>
    </div>

    <div class="card shadowexempl">
              <h2>Comptable Fonction</h2>
              <h5>Inventaire stocks Magasin</h5>
              <form action="coursierinsertachat.php" method="POST">
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
                    <button type="submit">Envoyé</button>
              </form>

              <p>Autres fonctions...</p>
              <p>Le ou la comptable est chargé de vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
    </div>


    <div class="card shadowexempl">
        <h2>Comptable Fonction</h2>
        <h5>Bon De Commande</h5>
 
          <div><form action="comptableboncommande.php" method="POST">
            <div>
                          <label for="magasin"><b>Magasin </b></label>

               <select name="magasin">

           <?php
   
           include('config.php');
              // $query=mysqli_query($conn,"select * from `users`");
              $sql = "SELECT DISTINCT nom , matricule FROM magasintable";
                
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
                 

              

              <label for="codearticl"><b>Libellé </b></label>
              <input type="text" name="codearticl"> 

              <label for="artcl"><b>Tarif</b></label>
              <input type="text" name="artcl"> 
              </div>


              <label for="comandnum"><b>Numéro Commande</b></label>
          <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
         
             
              <br>
              <br>

              <!-- <label for="comandnum"><b>Numéro Commande</b></label>
          <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
          <label for="facturnum"><b>Numéro Facture</b></label>
          <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required> -->
         <!--  <label for="date"><b>Date</b></label>
          <input type="date"  name="date" required>
          <label for="date"><b>Heure</b></label>
          <input type="date"  name="date" required> -->

          <br> <br> 
           
          <button type="submit">Envoyé</button>
              
            </form></div>
            <p>Autres fonctions..</p>

          <p>Le ou la comptable est chargé de vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
    </div>
   </div>
  <div class="rightcolumn">
    <div class="card shadowexempl">
      <h2>Profile </h2>
            <div class="fakeimg" style="height:100px;"><img src="images/contact.png" style="height:80px;"></div>
<b>Bonjour Mr <?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
      <br>
      <br>
      <b>role: <?php echo htmlspecialchars($_SESSION["role"]); ?></b>
            <br>
      <b>tel: <?php echo htmlspecialchars($_SESSION["tel"]); ?></b>
        <br>
      <b>email: <?php echo htmlspecialchars($_SESSION["email"]); ?></b>
      <b>matricule: <?php echo htmlspecialchars($_SESSION["matricule"]); ?></b>
    </div>
    <div class="card">
      <h3>Type Role</h3>
      <div class="rolebtn"><a href="coursier/welcomecoursier.php"><button >Coursier</button></div>
      <div class="rolebtn"><a href="gestionnairestock/welcomestocker.php"><button >Gestionnaire de Stock</button></div>
      <div class="rolebtn"><a href="cmu/welcomecmu.php"><button >Gestion CMU</button></div>
      <div class="rolebtn"><a href="surveillante/welcomsurveillante.php"><button >Surveillant(e)</button></div>
      <div class="rolebtn"><a href="comptable/welcomecomptable.php"><button >Comptable</button></div>
      <div class="rolebtn"><a href="a.p"><button >Admin</button></div>
      <div class="rolebtn"><a href="#"><button >Super Admin</button></div>
      
      <a href="logout.php"><button class="fakeimg" >Log Out</button></a>
    </div>
    
    <div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
   include('config.php');
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

    <div class="card">
       <h3>Lire les Messages</h3>
      
      <button >Lire</button>
    </div>
  </div>



</div>

<div class="footer">
  <h2>Pied De Page</h2>
</div>

<div id="id01" class="modal1">
  
  <form class="modal-content animate" action="loginmember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
<!--       <img src="images/1550389719.jpeg" alt="Avatar" class="avatar">
 -->    </div>

    <div class="container">
      <h3>Prévision Consommation</h3>
      <label for="datefin"><b>Date</b></label>
      <input type="date"  name="datefin" required>
      <br> <br> 

      <label for="artcl"><b>Article</b></label>
      <input type="text" placeholder="Entrer Article" name="artcl" required>
       <br> <br>

      <label for="qtite"><b>Quantité</b></label>
      <input type="number"  name="qtite" required>
      <label for="pu"><b>P.U</b></label>
      <input type="number"  name="pu" required>
       <br> <br>
        
      <button type="submit">Envoyé</button>
     
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
    </div>

    <div class="container">
            <h3>Entrée d'achats</h3>

      <label for="libeller"><b>Libellé</b></label>
      <input type="text" placeholder="Entrer Libellé" name="libeller" required>

      <label for="tarif"><b>Tarif</b></label>
      <input type="text" placeholder="Entrer le Tarif" name="tarif" required>
      <label for="comandnum"><b>Numéro Commande</b></label>
      <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
      <label for="facturnum"><b>Numéro Facture</b></label>
      <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required>
      <label for="date"><b>Date</b></label>
      <input type="date"  name="date" required>
      <br> <br> 
      <label for="time"><b>Time</b></label>
      <input type="time"  name="time" required>
      <br> <br> 
        <label for="fourni"><b>Fournisseur </b></label>
      <input type="text" placeholder="Entrer le fournisseur" name="fourni" required>
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id03" class="modal3">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Entrée de Production</h3>

      <label for="libeller"><b>Libellé</b></label>
      <input type="text" placeholder="Entrer Libellé" name="libeller" required>

      <label for="centre"><b>Centre</b></label>
      <input type="text" placeholder="Entrer le Centre" name="centre" required>
            <br> <br> 

      <label for="date"><b>Date</b></label>
      <input type="date"  name="date" required>
      <label for="time"><b>Time</b></label>
      <input type="time"  name="time" required>
      <br> <br> 
      
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id04" class="modal4">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
<!--       <img src="images/1550389719.jpeg" alt="Avatar" class="avatar">
 -->    </div>

    <div class="container">
            <h3>Consommation Interne</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
    
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id05" class="modal5">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
<!--       <img src="images/1550389719.jpeg" alt="Avatar" class="avatar">
 -->    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id06" class="modal6">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Pertes et Avaries et péremption</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id06').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id07" class="modal7">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id07').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id07').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id08" class="modal8">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id08').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id08').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id09" class="modal9">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id09').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id09').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id010" class="modal10">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id010').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id010').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>
<div id="id011" class="modal11">
  <div class="card">
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id011').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
        <?php include('membre/managemembre.php');?>

    
  </div>
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id011').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    
  </form>
</div>

<div id="id012" class="modal7">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id012').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id012').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id013" class="modal13">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id013').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id013').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id014" class="modal14">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id014').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id014').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id015" class="modal15">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id015').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id015').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>
<div id="id016" class="modal16">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id016').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id016').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id017" class="modal17">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id017').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id017').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>


<div id="id018" class="modal18">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id018').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id018').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>


<div id="id019" class="modal19">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id019').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id019').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id020" class="modal20">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id020').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id020').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id021" class="modal21">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id021').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Déstockage pour livraisons-clients</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id021').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id022" class="modal22">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id022').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Catégorie</h3>

      <label for="email"><b>nom</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>codecat</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Catégorie Description</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id022').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>

<div id="id023" class="modal23">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id023').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Catégorie</h3>

      <label for="email"><b>nom</b></label>
      <input type="text" placeholder="Entrer nom categorie" name="email" required>

      <label for="psw"><b>codecat</b></label>
      <input type="password" placeholder="Entrer code categorie" name="psw" required>
      <label for="psw"><b>Catégorie Description</b></label>
      <input type="password" placeholder="Entrer description categorie" name="psw" required>
        
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id023').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>
</body>
</html>