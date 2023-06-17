

<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
include("component/headpart.php"); 

?>
 

<body>
<?php include("./component/headersection.php"); ?>
<?php include("./menu/topmenu.php"); ?>
<?php include("menu/menuadmin.php"); ?>
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
 
   include_once('db/config.php');
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
 
   include('db/config.php');
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
             
               include('db/config.php');
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
             
                        include('db/config.php');
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
             
                      include('db/config.php');
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
           
             include_once('db/config.php');
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
      <h5>Entré Produit CMU</h5>
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
 
   include_once('db/config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT nom , matricule FROM situation where matricule_module='1' ";
            
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
      <h5>Sorti Produit CMU</h5>
<!--       <div class="fakeimg" style="height:200px;">Image</div>
 -->
        <div><form action="coursierinsertachat.php" method="POST">
          <div>
             <label for="artcl"><b>Code Article</b></label>
          <input type="text" name="artcl"> 
          </div>

           
           <label for="magasin"><b>Situation Du Produit </b></label> <select name="format">

         <?php
 
   include('db/config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT nom , matricule FROM situation where matricule_module='1' ";
            
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
      <h5>Inventaire Boutique </h5>
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
   
           include('db/config.php');
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
  <?php include("component/profile.php");?>
  <?php include("component/role.php");?>
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

    <div class="card">
       <h3>Lire les Messages</h3>
      
      <button >Lire</button>
    </div>
  </div>



</div>

<?php include("component/pieddepage.php"); ?>

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

</body>
</html>