<?php
// Initialize the session
session_start();

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login.php");
    exit;
}
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// $url = "https://testurl.com/test/1234?email=abc@test.com&name=sarah";
$components = parse_url($url);
parse_str($components['query'], $results);
$codeis=$results['idpk'];
$designation='';
$description='';
$prixachat='';
$prixvente='';

$sql = "SELECT * FROM article WHERE matricule=:matricule ";
         include('../../db/config.php');


                    if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":matricule", $codeis, PDO::PARAM_STR);
            if($stmt->execute()){
                if($stmt->rowCount() >0){
                    
                    if($row = $stmt->fetch()){
                        $designation = $row["designation"];
                        $description = $row["description"];
                        $prixvente = $row["prixvente"];
                        echo$prixachat = $row["prixachat"];
                        // $location = $row["location"];

                        }}}}

                        include("../../component/headpart.php"); 

?>

<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic est une Clinique de réference.</p>
</div>

<?php include("../../menu/menugestionairestock.php"); ?>


<div class="row">
  <div class="leftcolumn">
      <div class="card shadowexempl">
              <div id="entrerarticle">

                  <h2>Article Gestion</h2>
                  <h5>Gestionaire de Stock Fonction</h5>


    <div class="container">
            <h3>Vous Êtes entrain de vouloir supprimer cet article</h3>
            <center>
                          <h4 class="sizeelement"><?php echo$designation;?></h4>

            <div class="sameline">
              <img class="elemen" src="../../images/deleteicon.jpg">
              <p class="elemen">Description: <?php echo"  ".$description;?> <br>Prix Achat: <?php echo $prixachat;?> <br>Prix De Vente: <?php echo $prixvente;?><br></p>
              


              

            </div>
            </center>

            

      
      <br> <br> 
      
<form action="../apiarticle.php" method="POST">

<input type="hidden" name="matricule" value="<?php echo $codeis;?>">
<input type="hidden" name="formulaire" value="delete">
        <button type="submit" name="button1" >Supprimer</button>

</form>      
    </div>

    

                  
      
     
            
                    
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



 