<?php
// Initialize the session
session_start();

// require("viewarticle.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
}
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

                  <h2>Articles Gestion</h2>
                  <h5>Gestionaire de Stock Fonction</h5>
                  <center>  <?php 
      if(isset($_COOKIE['messagedisplay'])) : ?>
       

         <div class="alerttext">
          
          <p>
            <?php echo $_COOKIE['messagedisplay']; ?></p>
          </div>
            <?php endif; ?>

          </center>

                   <center>  
        <?php  
          
        // Import the file where we defined the connection to Database.     
            require_once "../../db/conn.php";   
        
            $per_page_record = 4;  // Number of entries to show in a page.   
            // Look for a GET variable page if not found default is 1.        
            if (isset($_GET["page"])) {    
                $page  = $_GET["page"];    
            }    
            else {    
              $page=1;    
            }    
        
            $start_from = ($page-1) * $per_page_record;     
        
            $query = "SELECT matricule, designation, description, poids_kg, article.quantity_per_unit, code_category,format, prixvente, prixachat, tmc, groupcode FROM article  LIMIT $start_from, $per_page_record";     
            $rs_result = mysqli_query ($con, $query);    
        
            // Recherche de médicaments
    if (isset($_GET['search'])) {
      $searchTerm = $_GET['search'];
      $query = "SELECT matricule, designation, description, poids_kg, article.quantity_per_unit, code_category,format, prixvente, prixachat, tmc, groupcode FROM article WHERE 
      designation LIKE '%$searchTerm%' OR
      description LIKE '%$searchTerm%' OR
      poids_kg LIKE '%$searchTerm%' OR
      quantity_per_unit LIKE '%$searchTerm%' OR
      prixachat LIKE '%$searchTerm%' OR
      format LIKE '%$searchTerm%' OR
      prixvente LIKE '%$searchTerm%' ";
      // $stmt = $database->query($query);
      // $liste_medicament = $stmt->fetchAll();
      $rs_result = mysqli_query ($con, $query);    

  } else {
      // Requête pour récupérer les médicaments de la page courante
      $query = "SELECT matricule, designation, description, poids_kg, article.quantity_per_unit, code_category,format, prixvente, prixachat, tmc, groupcode FROM article  LIMIT $start_from, $per_page_record";
      // $stmt = $database->query($query);
      // $liste_medicament = $stmt->fetchAll();
      $rs_result = mysqli_query ($con, $query);    

  }
        
        ?>    
      
        <div class="container">   
          <br>   
          <div>
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Ajouter Un Article</button>   
            <h1>Liste Des Articles</h1>   
            <h3> Vous avez la possibilité de Modifier et Supprimer.   
          </h3>  
          <form method="GET" action="">
            <div class="form_input">
                <input type="text" name="search" id="searchInput" placeholder="Entrez un nom de médicament"
                    value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <button type="submit" class="bouton_rechercher">Rechercher</button>
            </div>
        </form>

            <table id="customers" class="table table-striped table-condensed    
                                              table-bordered">   
              <thead>   
                <tr>   
                  <th width="10%">matricule</th>   
                  <th width="10%">designation</th>   
                  <th>description</th>   
                  <th>poidsenkg</th>   
                  <th>categorycode</th>   
                  <th>Prix Achat</th>   
                  <th>Prix Vente</th>   
                  <th></th>   
                </tr>   
              </thead>   
              <tbody>   
        <?php     
                while ($row = mysqli_fetch_array($rs_result)) {    
                      // Display each field of the records.    
                ?>     
                <tr>     
                 <td><?php echo $row["matricule"]; ?></td>     
                     
                <td><?php echo $row["designation"]; ?></td>   
                <td><?php echo $row["description"]; ?></td>   
                <td><?php echo $row["poids_kg"]; ?></td>   
                <td><?php echo $row["code_category"]; ?></td>                                           
                <td><?php echo $row["prixachat"]; ?></td>                                           
                <td><?php echo $row["prixvente"]; ?></td>                                           
                <td>
                    <form action="articleedit.php" method="POST"> 
                    <div class="invisi">
                                        <input type="hidden"  name="matricule" value="<?php echo $row["matricule"]; ?>">
                                        <input type="hidden"  name="designation" value="<?php echo $row["designation"]; ?>">
                                        <input type="hidden"  name="description" value="<?php echo $row["description"]; ?>">
                                        <input type="hidden"  name="poidsenkg" value="<?php echo $row["poids_kg"]; ?>">
                                        <input type="hidden"  name="quantity_per_unit" value="<?php echo $row["quantity_per_unit"]; ?>">
                                        <input type="hidden"  name="tmc" value="<?php echo $row["tmc"]; ?>">
                                        <input type="hidden"  name="prixvente" value="<?php echo $row["prixvente"]; ?>">
                                        <input type="hidden"  name="prixachat" value="<?php echo $row["prixachat"]; ?>">
                                        <input type="hidden"  name="format" value="<?php echo $row["format"]; ?>">
                                        <input type="hidden"  name="category" value="<?php echo $row["code_category"]; ?>">
                                        <input type="hidden"  name="groupcode" value="<?php echo $row["groupcode"]; ?>">
                                        
</div>
              
<div id="outer">
  <div class="inner"><button type="submit"  >Modifier</button></div>
  <div class="inner"><button type="button" id="<?php echo $row["matricule"]; ?>" onclick="myFunctionDelete(this.id)">Supprimer</button></div>
 
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
            $query = "SELECT COUNT(*) FROM article";     
            $rs_result = mysqli_query($con, $query);     
            $row = mysqli_fetch_row($rs_result);     
            $total_records = $row[0];     
              
        echo "</br>";     
            // Number of pages required.   
            $total_pages = ceil($total_records / $per_page_record);     
            $pagLink = "";       
          
            if($page>=2){   
                echo "<a href='articlemanage.php?page=".($page-1)."'>  Prev </a>";   
            }       
                       
            for ($i=1; $i<=$total_pages; $i++) {   
              if ($i == $page) {   
                  $pagLink .= "<a class = 'active' href='articlemanage.php?page="  
                                                    .$i."'>".$i." </a>";   
              }               
              else  {   
                  $pagLink .= "<a href='articlemanage.php?page=".$i."'>   
                                                    ".$i." </a>";     
              }   
            };     
            echo $pagLink;   
      
            if($page<$total_pages){   
                echo "<a href='articlemanage.php?page=".($page+1)."'>  Next </a>";   
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

<?php include("../../component/pieddepage.php"); ?>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="../apiarticle.php" method="POST">
      <div class="container">
      <h3>Article Ajout</h3>       
      <label for="designation"><b>Nom Complet</b></label>
      <input type="text" placeholder="Entrer le nom de l'article" name="designation" >
      <label for="telmdf"><b>Description</b></label>
      <input type="text" placeholder="Entrer la description du produit"  name="description" >
      
      <label for="tmc"><b>TMC</b></label>
      <input type="number"  name="tmc" >
      <label for="poids_kg"><b>Poids en Kg</b></label>
      <input type="number"  name="poids_kg" >
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
      <input type="number"  name="quantity_per_unit" >
      <label for="prixachat"><b>Prix Achat </b></label>
      <input type="number"  name="prixachat" >
      <label for="prixvente"><b>Prix Vente </b></label>
      <input type="number"  name="prixvente" >

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
      <select>
        <option>Voie Orale</option>
        <option>Injectable</option>
        <option>Seringle</option>
                      </select>
      <br> <br> 
      <input type="hidden" name="formulaire" value="ajouter" >

      
      <button type="submit" name="">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>


<script>
    function go2Page()   
        {   
            var page = document.getElementById("page").value;   
            page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
            window.location.href = 'articlemanage.php?page='+page;   
        }  



 function myFunctionDelete(elem)   
        {   
          var message=elem;
            // alert(message) ;
            window.location.href = "articledelete.php?idpk="+message;

        } 
 
  
function SearchArticle() {
  var input, filter, table, tr, td, i,j, txtValue;
  input = document.getElementById("mysearchInput");
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
</body>
</html>


 