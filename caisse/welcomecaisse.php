<?php
ob_start();

// Initialize the session
session_start();
// require("../config.php");
require("viewcaisse.php");

                    include('../config.php');

 
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
<link rel="stylesheet" href="../css/style2.css">

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
  border: 1px solid black;
  font-size: 18px;
}

#myTable th{
  text-align: center;
  padding: 12px;
}
#myTable td {
  text-align: center;
  padding: 12px;
    border: 1px solid #dddddd;

}
#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


/*the container must be positioned relative:*/
.caisseautocomplete {
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

.caisseautocomplete-items {
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

.caisseautocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.caisseautocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.caisseautocomplete-active {
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
  <h1>Clinic St Vincent d'Afrique</h1>
  <p>La Clinic St Vincent d'Afrique est une Clinique de réference.</p>
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
        <h4>Voir Commandes</h4>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'executer')">Executer</button>
  <button class="tablinks" onclick="openCity(event, 'valider')">Valider</button>
</div>





<div id="valider" class="tabcontent">
  <h3>Commande Valider</h3>
  <p>Commande(s) validée(s) par la comptabe</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandevalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libellé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
          <form method="POST" action="printpage.php">
          <input type="hidden" name="Libellé" value=<?php echo$commande[1]; ?>>
          <input type="hidden" name="Description" value=<?php echo$commande[2]; ?>>
          <input type="hidden" name="Tarif" value=<?php echo$commande[3]; ?>>
          <input type="hidden" name="Situation" value=<?php echo$commande[5]; ?>>
          <input type="hidden" name="EmailCaisse" value=<?php echo$_SESSION["email"]; ?>>
          <input type="hidden" name="FullnameCaisse" value=<?php echo$_SESSION["fullname"]; ?>>
          <input type="hidden" name="TelCaisse" value=<?php echo$_SESSION["tel"]; ?>>
              <!-- <input type="submit"> -->
          

                    <button  type="submit"  value="Submit">Imprimer</button>
                    </form>

         
        
          
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

<div id="executer" class="tabcontent">
  <h3>Commande Executer</h3>
  <p>Liste des Commandes Executer</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandExecuter as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
          <!-- <button>Imprimer</button> -->
         
        
          
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
        <h2>Stock Liste</h2>
<h3>Voulez vous rechercher un article?</h3>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        <div class="retraitarticleperunit">
          <div class="wrapper">


<table id="myTable">
  <tr class="header">
    <th style="width:40%;">Article</th>
    <th style="width:15%;">Groupe Code</th>
    <th style="width:15%;">Quantity</th>
    <th style="width:15%;">Prix Achat</th>
    <th style="width:15%;">Prix Vente</th>
  </tr>
  
  <?php 
  foreach($stockcmu as $element){

    ?>
    <tr>     
      <td contentEditable ><?php echo $element["designation"]; ?></td>              
      <td><?php echo $element["groupcode_article"]; ?></td>                                              
      <td><?php echo $element["quantity"]; ?></td>                                              
      <td><?php echo $element["prixachat"]; ?></td> 
      <td><?php echo $element["prixvente"]; ?></td>                                              
    </tr>

    <?php

  }

  ?>
  
</table>

          

        </div>

        </div>
        

         <div id="payement">

                <h2>Caisse Payement</h2>
                <h5>Gestionaire de Stock Fonction</h5>

                  <div><form method="POST"  action="apicaisse.php" autocomplete="off"  id="formtable">
                    <div>           

                    


                  <label for="titre"><b>Titre </b></label><input type="text" name="titre">
                  <label for="artcl"><b> Article </b></label>
                  <div class="caisse" id="aftercaisse"> 

<!--Make sure the form has the autocomplete function switched off:-->
<!-- <form autocomplete="off"  id="formtable"> -->
  <div class="caisseautocomplete" style="width:300px;">
    <input id="caissemyInput" type="text" name="myArticle" placeholder="Nom de l'article ici">
  </div>
  <input type="number" name="quantity" id="idqty" placeholder="Entrer quantité">
  <input type="button" onclick="addarticle()" value="Ajouter">
<!-- </form> -->
</div>
<br><br>

                    
                    <label for="prix"><b>Prix </b></label><input type="number" name="prix">
                    <label for="recu"><b>Somme Reçu </b></label><input type="number" name="recu">
                    

                    </div>
                    <br> <br> 
                    <label for="apayer"><b>Payable </b></label>

                       <select name="apayer">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>

                       </select>
                      
                     
                   
                          <label for="module"><b>Module </b></label>

                         <select name="module">

                     <?php
             
               include('../config.php');
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
                                                    </select><br>
              
                                  <input type="hidden" name="formulaire" value="caissepayment">
                                  <input type="hidden"  name="description" id="descriptioninput">

                <br> <br> 
                          
                 
                <!-- <button type="submit" name="caissepayment">Envoyé</button> -->
                <input type="submit"  value="Envoyé" />
                    
                  </form></div>
                  <p>Autres fonctions..</p>
                <p>Le caissière de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
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
    <?php 
    if($_SESSION['role']=="SuperAdmin"){

      ?>
      <div class="card">
      <h3>Type Role</h3>
      <div class="rolebtn"><a href="../coursier/welcomecoursier.php"><button >Coursier</button></div>
      <div class="rolebtn"><a href="../gestionnairestock/welcomestocker.php"><button >Gestionnaire de Stock</button></div>
      <div class="rolebtn"><a href="../cmu/welcomecmu.php"><button >Gestion CMU</button></div>
      <div class="rolebtn"><a href="#"><button >Caisse</button></div>
      <div class="rolebtn"><a href="../surveillante/welcomsurveillante.php"><button >Surveillante</button></div>
      <div class="rolebtn"><a href="../comptable/welcomecomptable.php"><button >Comptable</button></div>
      <div class="rolebtn"><a href="#"><button >Admin</button></div>
      <div class="rolebtn"><a href="../welcomesuperAdmin.php"><button >Super Admin</button></div>
      
      <a href="logout.php"><button class="fakeimg" >Log Out</button></a>
    </div>

      <?php
    }

    ?>
     <div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
         //dsimagasine\wp-content\uploads\woocommerce_uploads\2023\01
 //dsimagasine/wp-contentuploadswoocommerce_uploads202301
   // include('../config.php');
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
                                      }  }}}
                                          // unset($pdo);
        ?>
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
  <h2>Footer</h2>
</div>
<script type="text/javascript" src="../javascript.js"></script>
<script type="text/javascript">
    
      

      let data=[];
      let dataarray=[]
    function addarticle(){
      
      var xarticle = document.getElementById("caissemyInput").value;
      var xqty = document.getElementById("idqty").value;

      alert(xarticle+xqty);

//         let data = [
//   ['Title', 'Artist', 'Duration', 'Created'],
//   ['hello', 'me', '2', '2019'],
//   ['ola', 'me', '3', '2018'],
//   ['Bob', 'them', '4.3', '2006']
// ];
      if(data.length===0){
        data.push( ['Article', 'Quantity']);
          data.push([xarticle, xqty]);
          dataarray.push( [xarticle, xqty]);



function getCells(data, type) {
  return data.map(cell => `<${type}>${cell}</${type}>`).join('');
}

function createBody(data) {
  return data.map(row => `<tr>${getCells(row, 'td')}</tr>`).join('');
}

function createTable(data) {

  // Destructure the headings (first row) from
  // all the rows
  const [headings, ...rows] = data;

  // Return some HTML that uses `getCells` to create
  // some headings, but also to create the rows
  // in the tbody.
  return `
    <table id="tbl2">
      <thead>${getCells(headings, 'th')}</thead>
      <tbody>${createBody(rows)}</tbody>
    </table>
  `;
}

// Bang it altogether
  const placetable = document.getElementById("aftercaisse");

placetable.insertAdjacentHTML('beforeend', createTable(data));

      }else{
        // Find a <table> element with id="myTable":
var table = document.getElementById("tbl2");

// Create an empty <tr> element and add it to the 1st position of the table:
var row = table.insertRow(-1);

// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);

// Add some text to the new cells:
cell1.innerHTML = xarticle;
cell2.innerHTML = xqty;
// dataarray.push( [xarticle, xqty]);
          dataarray.push( [xarticle, xqty]);

      }

            alert(dataarray.toString());
            document.getElementById("descriptioninput").value = dataarray.toString();

        
      
    }

    // alert(obj);
</script>
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
     
  }
}




function caisseautocomplete(inp, arr) {
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
      a.setAttribute("id", this.id + "caisseautocomplete-list");
      a.setAttribute("class", "caisseautocomplete-items");
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
      var x = document.getElementById(this.id + "caisseautocomplete-list");
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
    x[currentFocus].classList.add("caisseautocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("caisseautocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("caisseautocomplete-items");
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

var obj = <?php echo json_encode($stockcmu); ?>;
    var objarticle=[];
    <?php foreach ($stockcmu as $element){ ?>
      var art=<?php echo json_encode($element["designation"]); ?>;
      objarticle.push(art);
      <?php
    }
      ?>
/*An array containing all the country names in the world:*/
var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
caisseautocomplete(document.getElementById("caissemyInput"), objarticle);
</script>

</body>
</html>

<?php

 ob_end_flush();
?>