<?php

// Initialize the session
session_start();
 // require("viewcoursier.php");

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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

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
      <h2>Coursier Function</h2>
      <h5>Insertion de Données </h5>
<!--       <div class="fakeimg" style="height:200px;">Image</div>
 -->
        <div><form  method="POST" action="apicoursier.php">
          <div>
                    <label for="artcl"><b> Article </b></label>
                    <input type="text" name="autocomplete-search" id="autocomplete-search" placeholder="search here...." class="form-control" required>
          </div>
           
          

          <label for="quantite"><b>Quantité</b></label>
          <input type="number" name="quantite" required> 

          <label for="quantityperunit"><b>Quantité par Unité</b></label>
          <input type="number" name="quantityperunit" required> 

          <label for="prixachat"><b>Prix d'Achat</b></label>
          <input type="number" name="prixachat" required> 
          <br> <br> 

          <label for="description"><b>Description</b></label>
          <input type="text" name="description"> 

           <label for="poids"><b>Poids</b></label>
          <input type="number" name="poids">
         
          <label for="format"><b>Format </b></label>

                       <select name="format">

                   <?php
           
             include_once('../db/config.php');
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
                                                  </select><br> <br>

           <label for="comandnum"><b> Commande</b></label>
<!--                   <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
 -->                   
 <select name="comandnum">

                     <?php
             
               include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT libeller , matricule FROM bondecommandedb ORDER  BY matricule DESC LIMIT 3";
                        
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
                                                     
      <label for="facturnum"><b>Numéro Facture</b></label> 
      <select name="facturnum">

                     <?php
             
               include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT numfacture  FROM achatentrer ORDER  BY timestamp DESC LIMIT 10";
                        
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
                                                    </select>      <br> <br>              

<!--       <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required>
 -->      
 <!-- <label for="date"><b>Date</b></label>
      <input type="date"  name="date" required> -->
      <br> <br> 
      <input type="hidden" name="formulaire" value="achatcoursier">
                
       
      <button type="submit" >Envoyé</button>
          
        </form></div>
        <p>Autres fonctions..</p>
      <p>Le Cousier n'a aucune autre fonction.</p>
    </div>
    <div class="card">
      <h2>Notice</h2>
      <h5>Information à savoir</h5>
      
      <p>Pour gérer les erreurs de saisies, avant d'insérer un article qui vient d'être acheter, rassurer vous que le ou la comptable a inséré l'entrée d'achat concernant cet article. L'entrée d'achat est liée à l'article par le numéro de la facture et le numéro de la commande. Le coursier ne peut donc pas insérer un numéro de facture ou de commande inexistant dans la base de données lors d'une erreur de saisies. Dans le cas où le Coursier saisit une entrée (le numéro de la facture ou le numéro de la commande) conforme à celle sur papier et que le système n'accepte pas l'opération et fait sorti une erreur, le coursier doit alerter le ou la comptable sur une possible erreur lié à l'entrée d'achat concernant cet article.</p>
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
    </div>
    <div class="card">
      <h3>Role Coursier</h3>
      <div class="fakeimg"><p>Chargé d'insérer les données liées à l'achat des articles</p></div>
      <a href="../logout.php"><button class="fakeimg" >Log Out</button></a>
    </div>
    <div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
   include('../db/config.php');
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
<script type="text/javascript">
  $(function() {
     $( "#autocomplete-search" ).autocomplete({
       source: '../ajax-autocomplete-search-data.php',
     });
  });
</script>
</body>
</html>
