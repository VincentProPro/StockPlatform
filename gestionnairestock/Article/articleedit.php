<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login.php");
    exit;
}

include("../../component/headpart.php"); 

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
 

<body>

<div class="header">
  <h1>Clinic</h1>
  <p>La Clinic  est une Clinique de réference.</p>
</div>

<?php include("../../menu/menugestionairestock.php"); ?>


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



 