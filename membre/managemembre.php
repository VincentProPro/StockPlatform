


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

<!--  <meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
<link rel="stylesheet" href="../css/style2.css">

<script src="jquery.js"></script> 
    <script> 
    $(function(){
      $("#includedContentHeader").load("b.html"); 
      $("#includedContentMenu").load("b.html"); 
    });
    </script> 

    <style type="text/css">
      
.btn1class {
  background-color: #0040ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
    </style>
</head>
<body>

<div class="header">
  <h1>Clinic</h1>
  <p>La Clinic  est une Clinique de réference.</p>
</div>
<?php include("../menu/menuadmin.php"); ?>

<div class="row">
  <div class="leftcolumn">
    <div class="card shadowexempl">
      <main class="main-container container_960">
    <!-- Main content Section -->
   <div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Membre </h2>
    
      <center><?php 
      $matricule="";
      $lemail="";
      $telnumber="";
      $lposition="";
      $lrole="";
      $lstatus="";
      try{
      $matricule=$_GET['editmatricule'];;
      $lfullname=$_GET['editfullname'];;
      $lemail=$_GET['editemailfourni'];;
      $telnumber=$_GET['editphone'];;
      $lposition=$_GET['editposition'];;
      $lstatus=$_GET['editstatus'];;
      $lrole=$_GET['editrole'];;

      }catch(exception $e){
        echo$e;


      }
  


      if(isset($_COOKIE['messagedisplay'])) : ?>

        <p>
            <?php echo $_COOKIE['messagedisplay']; ?></p>
            <?php endif; ?></center>
    </div>
    <div class="card">

<div id="staff" class="tabcontent2">
  <h1>Ajouter un Membre</h1>

  <div id="messageoutputlicence"></div>


                <div class="container2">
                  <form  method="POST" action="apimembreadd.php" >
                    
                   <div class="row">
                      <div class="col-25">
                        <label for="lfullname">Nom complet </label>
                      </div>
                      <div class="col-75">
                        <input type="text"  name="fullname" placeholder="Nom et prenom(s).." value="<?php echo $editfullname; ?>" required>
                        <input type="hidden"  name="matricule"  value="<?php echo $matricule; ?>" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="tel">Phone Number </label>
                      </div>
                      <div class="col-75">
                        <input type="text"  name="tel" value="<?php echo $telnumber; ?>">
                      </div>
                    </div>
                                            

                    <div class="row">
                      <div class="col-25">
                        <label for="email">Email </label>
                      </div>
                      <div class="col-75">
                        <input type="text"  name="email" placeholder="Votre email ici.." value="<?php echo $editemailfourni; ?>" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="position">Position</label>
                      </div>
                      <div class="col-75">
                        <input type="text"  name="position" placeholder="Votre fonction .." value="<?php echo $lposition; ?>" required>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-25">
                        <label for="role">Role</label>
                      </div>
                      <div class="col-75">
                                                <select name="role">

                          <option value="Coursier">Coursier</option>
                          <option value="Gerant CMU">Gerant CMU</option>

                          <option value="Gestionnaire de Stock">Gestionnaire de Stock</option>
                          <option value="Caisse">Caisse</option>
                          <option value="Surveillante">Surveillante</option>

                          <option value="Comptable">Comptable</option>
                          <option value="Admin">Admin</option>
                          <option value="Boss">Boss</option>
                          <option value="SuperAdmin">SuperAdmin</option>
                        </select>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-25">
                        <label for="role">Status</label>
                      </div>
                      <div class="col-75">
                                                <select name="status">

                          <option value="actif">Actif</option>
                          <option value="inactif">Inactif</option>
                          
                        </select>
                      </div>
                    </div>
                    
                      
                   

                 
                  
                    <div class="row">
                      <input class="btn1class" type="submit" name='addmember' value="Envoyé">
<!--                       <button onclick="demadeaffiliation()">Envoyé</button>
 -->                    </div>
                  </form>
                </div>

                <center>  
                            <?php  
                              
                            // Import the file where we defined the connection to Database.     
                                require_once "../db/config.php";   
                            
                                $per_page_record = 3;  // Number of entries to show in a page.   
                                // Look for a GET variable page if not found default is 1.        
                                if (isset($_GET["page"])) {    
                                    $page  = $_GET["page"];    
                                }    
                                else {    
                                  $page=1;    
                                }    
                            
                                $start_from = ($page-1) * $per_page_record;     
                            
                                
                                 $query = "SELECT matricule,fullname,tel,email,position,role,matriculredacteur,status FROM users ORDER BY matricule DESC LIMIT $start_from, $per_page_record  ";  
 $rs_result=array();

 if($stmt = $pdo->prepare($query)){
            // Bind variables to the prepared statement as parameters
// $return->bindValue( 'term', $term, PDO::PARAM_STR );
            
            // Set parameters
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() >0){
                    $rs_result= $stmt->fetchAll();

                    }}} 
                            ?>    
                          
                            <div class="container">   
                              <br>   
                              <br>   
                              <br>   
                              <br>   
                              <div>

                                <h1>Liste Des Membres</h1>   
                                <p> Modifier et Supprimer.   
                                </p> 
                                                                <input type="text" id="myInputsearch" onkeyup="myFunctionsearch()" placeholder="Search for objects.." title="Type in a name">

                                <div class="wrapper"> 


                                <table id="customers" class="table table-striped table-condensed    
                                                                  table-bordered">   
                                  <thead>   
                                    <tr>
                                      <th width="10%">fullname</th>   
                                      <th >tel</th>   
                                      <th>email</th>   
                                      <th>position</th>   
                                      <th>role</th>   
                                      <th>matriculredacteur</th>   
                                      <th>status</th>     
                                      <th></th>   
                                    </tr>   
                                  </thead>   
                                  <tbody>   
                            <?php     
                                    foreach ($rs_result as $row) {    
                                          // Display each field of the records.    
                                    ?>     
                                    <tr>
                                                                    <td><?php echo $row["fullname"]; ?></td>                                           
                                              
                                    <td><?php echo $row["tel"]; ?></td>   
                                    <td><?php echo $row["email"]; ?></td>   
                                    <td><?php echo $row["position"]; ?></td>                                           
                                    <td><?php echo $row["role"]; ?></td>                                           
                                    <td><?php echo $row["matriculredacteur"]; ?></td>                                           
                                

                                    <td><?php echo $row["status"]; ?></td>                                           
                                                             
                                    <td>
                                        <form  method="GET"> 
                                        <div class="invisi">
                                                            <input type="hidden"  name="editmatricule" value="<?php echo $row["matricule"]; ?>">
                                                            <input type="hidden"  name="editfullname" value="<?php echo $row["fullname"]; ?>">
                                                            <input type="hidden"  name="edittel" value="<?php echo $row["tel"]; ?>">
                                                            <input type="hidden"  name="editemail" value="<?php echo $row["email"]; ?>">
                                                            <input type="hidden"  name="editposition" value="<?php echo $row["position"]; ?>">
                                                            <input type="hidden"  name="editrole" value="<?php echo $row["role"]; ?>">
                                                            <input type="hidden"  name="editstatus" value="<?php echo $row["status"]; ?>">
                            </div>
                                          
                            <div id="outer">
                              <div class="inner"><button  class="buttondelemodi" type="submit"  >Modifier</button></div>
                              
                             
                            </div>
                            </form>

                                            
                                    </td>                                           
                                    </tr>     
                                    <?php     
                                        };    
                                    ?>     
                                  </tbody>   
                                </table> 
                                </div>  
                          
                             <div class="pagination">    
                              <?php  
                                $query = "SELECT COUNT(*) FROM users";     
                                $rs_result = $pdo->query($query);  
   
                                $row = $rs_result->fetch();     
                                $total_records = $row[0];     
                                  
                            echo "</br>";     
                                // Number of pages required.   
                                $total_pages = ceil($total_records / $per_page_record);     
                                $pagLink = "";       
                              
                                if($page>=2){   
                                    echo "<a href='managemembre.php?page=".($page-1)."'>  Prev </a>";   
                                }       
                                           
                                for ($i=1; $i<=$total_pages; $i++) {   
                                  if ($i == $page) {   
                                      $pagLink .= "<a class = 'active' href='managemembre.php?page="  
                                                                        .$i."'>".$i." </a>";   
                                  }               
                                  else  {   
                                      $pagLink .= "<a href='managemembre.php?page=".$i."'>   
                                                                        ".$i." </a>";     
                                  }   
                                };     
                                echo $pagLink;   
                          
                                if($page<$total_pages){   
                                    echo "<a href='managemembre.php?page=".($page+1)."'>  Next </a>";   
                                }   
                          
                              ?>    
                              </div>  
                          
                          
                              <div class="inline">   
                              <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
                              placeholder="<?php echo $page."/".$total_pages; ?>" required>   
                              <button class="buttondelemodi" onClick="go2Page();">Go</button>   
                             </div>    
                            </div>   
                          </div>  

                </center>
</div>
      
    </div>
  </div>

</div>
    <!-- Pinting the Sidebar -->
  

</main>
<script type="text/javascript">
  function myFunctionsearch() {
  var input, filter, table, tr, td, td1,td2,td3,i, txtValue,txtValue2,txtValue3,txtValue4;
  input = document.getElementById("myInputsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td2 = tr[i].getElementsByTagName("td")[1];
    td3 = tr[i].getElementsByTagName("td")[2];
    td4 = tr[i].getElementsByTagName("td")[3];

    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      txtValue3 = td3.textContent || td3.innerText;
      txtValue4 = td4.textContent || td4.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }  


         
  }
}
   function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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

      function go2Page()   
        {   
            var page = document.getElementById("page").value;   
            page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
            window.location.href = 'managemembre.php?page='+page;   
        }  

 




</script>


    </div>
    
   </div>
  <div class="rightcolumn">
    <div class="card shadowexempl">
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
      <h3>Type Role</h3>
      <div class="rolebtn"><a href="coursier/welcomecoursier.php"><button >Coursier</button></div>
      <div class="rolebtn"><a href="gestionnairestock/welcomestocker.php"><button >Gestionnaire de Stock</button></div>
      <div class="rolebtn"><a href="cmu/welcomecmu.php"><button >Gestion CMU</button></div>
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