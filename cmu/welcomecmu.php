<?php
ob_start();
error_reporting(0);
// Initialize the session
session_start();
require("viewcmu.php");
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
<!--  <meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
       <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
       <style type="text/css">
         .alerttext{
          border: solid 3px red;
/*  background-color: red;
*/
}
.alerttext p{
  color: blue;
  font-size: 25px;
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
<!--   <a href="#" style="float:right">Link</a>
 -->
</div>

<div class="navbar">
    <a href="#entrerarticle">Entrer CMU</a>
    <a href="#retraitarticle">Sorti CMU</a>
   

 
   

   <div class="dropdown">
    <button class="dropbtn">Statistique 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="statisticcmu.php">Statistique Geeneral</a>
       <a href="statisticcmu.php#situationstock">Situation Stock</a>
      <a href="statisticcmu.php#frequencesorties">Frequence des sorties</a>
      <a href="statisticcmu.php#rentabiliarticle">Rentabilité par article </a>
      <a href="statisticcmu.php#evolutionrecette">Evolution Recette</a>
    </div>
  </div> 
 
   
 
</div>

<div class="row">
  <div class="leftcolumn">
                  
               
     <div class="card shadowexempl">
            <div id="retraitarticle">

                <h2>Retrait d'Article  </h2>
                <h5>Gérant CMU Fonction</h5>

                  <div><form method="POST" action="apicmu.php">
                    <div>           

                   


                    <label for="artcl"><b> Article </b></label><input type="text" name="autocomplete-search" id="artclid"  placeholder="search here...." class="form-control autocompletesearcharticle">

                    
                    <label for="quantity"><b>Quantité </b></label><input type="number" name="quantity">
                     <label for="caissematricule"><b>caisse sortie </b></label><select name="caissematricule" >

                                 <?php
                         
                                    include('../db/config.php');
                                  // $query=mysqli_query($conn,"select * from `users`");
                                  $sql = "SELECT DISTINCT titre , matricule FROM caisse where matricule_module=1 ORDER  BY matricule DESC LIMIT 3";
                                    
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
                                            <!--  <label for="prixachat"><b>Prix Achat </b></label><input type="text"  id="prixachat" name="prixachat">
                                             <label for="prixvente"><b>Prix Vente </b></label><input type="text" id="prixvente"  name="prixvente">
                                             <label for="taxe"><b>Taxe </b></label><input type="text" id="taxe"  name="taxe"> -->

                      <label for="situation"><b>Situation </b></label>

                                     <select name="situation">

                                 <?php
                         
                                    include('../db/config.php');
                                  // $query=mysqli_query($conn,"select * from `users`");
                                  $sql = "SELECT DISTINCT nom , matricule FROM situation where matricule_module=1";
                                    
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
                    




                    </div>
                      
                     
                   
               
                            <input type="hidden" name="formulaire" value="retraitartcl">

                          
                 
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
<script type="text/javascript">

  $(function() {
     $( ".autocompletesearcharticle" ).autocomplete({
       source: '../ajax-autocomplete-search-data.php',
     });
  });
    
</script>
</body>
</html>

<?php
    ob_end_flush(); // Flush the output from the buffer

?>