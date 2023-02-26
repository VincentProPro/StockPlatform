<?php
// ob_start();
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
/*the container must be positioned relative:*/
.dataautocomplete {
  position: relative;
  display: inline-block;
}

.caisse input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

.caisse input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

.caisse input[type=button] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.dataautocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.dataautocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.dataautocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.dataautocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
    
table { border-collapse: collapse; }
tr { border: 1px solid #dfdfdf; }
th, td { padding: 2px 5px 2px 5px; border: 1px solid #dfdfdf;}
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
  <center>  <?php 
      if(isset($_COOKIE['messagedisplay'])) : ?>
       

         <div class="alerttext">
          
          <p>
            <?php echo $_COOKIE['messagedisplay']; ?></p>
          </div>
            <?php endif; ?>

          </center>
        <h2>Stock Liste des Articles expirant Dans 3 Mois</h2>
        <h3>Voulez vous rechercher un article?</h3>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div class="retraitarticleperunit">
          <div class="wrapper">


                <table id="myTable">
                  <tr class="header">
                    <th style="width:40%;">Article</th>
                    <th style="width:15%;">Quantity</th>
                    <th style="width:15%;">Date d'Expiration</th>
                  </tr>
                  
                  <?php 
                  foreach($gerantcmu->viewStockExpiringInThree() as $element){

                    ?>
                    <tr>     
                      <td contentEditable ><?php echo $element["designation"]; ?></td>              
                      <td><?php echo $element["quantity"]; ?></td>                                              
                      <td><?php echo $element["dateexpiring"]; ?></td> 
                    </tr>

                    <?php

                  }

                  ?>
                  
                </table>   
          </div>

        </div>
        

         <div id="expiration">

                <h2>Gestion Des Dates d'Expiration </h2>
                <h5>Ajout de date d'expiration pour un Article</h5>

                  <div>
                    <form method="POST"  action="apicmu.php" autocomplete="off"  id="formtable">
                    <div>           
                      <div class="caisse" id="aftercaisse"> 

                        <div class="dataautocomplete" style="width:300px;">
                          <input id="myInputartcl" type="text" name="myArticle" placeholder="Nom de l'article ici">
                        </div>
                        <input type="number" name="quantity" id="idqty" placeholder="Entrer quantité">
                        <label>Date d'Expiration </label><input type="date" name="dateexpiring">
                      </div>
                      <br><br>
                </div>

                    
        <label for="situation"><b>Situation </b></label>

<select name="situation">

<?php

include('../db/config.php');
// $query=mysqli_query($conn,"select * from `users`");
$sql = "SELECT DISTINCT nom, matricule FROM situation";

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
                    <label for="format"><b>Format </b></label>

                      <select name="format">

                      <?php

                      include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom, matricule FROM format";

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

                          <label for="module"><b>Lieu </b></label>

                         <select name="lieu">

                     <?php
             
               include('../db/config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom, matricule FROM lieu";
                        
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
              
                                  <input type="hidden" name="formulaire" value="addexpire">
                                  <input type="hidden"  name="description" id="descriptioninput">

                <br> <br> 
                          
                 
                <!-- <button type="submit" name="caissepayment">Envoyé</button> -->
                <button type="submit"  value="Envoyé" > Enregistrer</button>
                    
                  </form></div>
                  <p>Autres fonctions..</p>
                <p>Le caissière de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>





      </div>
                  
               
     <div class="card shadowexempl">
            <div id="retraitarticle">

                <h2>Retrait d'Article  </h2>
                <h5>Gérant CMU Fonction</h5>

                  <div><form method="POST" action="apicmu.php">
                    <div>           

                   


                    <label for="artcl"><b> Article </b></label><input type="text" name="autocomplete-search" id="artclid"  placeholder="search here...." class="form-control autocompletesearcharticle">

                    
                    <label for="quantity"><b>Quantité </b></label><input type="number" name="quantity">
                    <label>Date d'Expiration </label><input type="date" name="dateexpiring">
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
     
  }
}
  function dataautocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "dataautocomplete-list");
      a.setAttribute("class", "dataautocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/

        //normaly if the item contain
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "dataautocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("dataautocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("dataautocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("dataautocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
  // var obj = <?php echo json_encode($stockcmu); ?>;
    var objarticle=[];
    <?php foreach ($gerantcmu->viewstockcmu() as $element){ ?>
      var art=<?php echo json_encode($element["designation"]); ?>;
      objarticle.push(art);
      <?php
    }
      ?>
/*An array containing all the country names in the world:*/
// var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
dataautocomplete(document.getElementById("myInputartcl"), objarticle);    
</script>
</body>
</html>

<?php
    // ob_end_flush(); // Flush the output from the buffer

?>