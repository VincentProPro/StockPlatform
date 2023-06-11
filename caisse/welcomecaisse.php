<?php
ob_start();
error_reporting(0);

// Initialize the session
session_start();
// require("../db/config.php");
require("viewcaisse.php");

                    include('../db/config.php');

 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../logout.php");
    exit;
}
include("../component/headpart.php"); 

?>
 <body>
<?php include("../component/headersection.php"); ?>

<?php include("../menu/menucaisse.php"); ?>

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
      <h2>Liste Des Entrés de Caisse </h2>
        <input type="text" id="mysearchInput" onkeyup="mycaissesearch()" placeholder="Rechercher une entré de caisse.." title="Type in a name">
        <div class="retraitarticleperunit">
          <div class="wrapper">
                <table id="myTableCaisse">
                  <tr class="header">
                    <th style="width:20%;">Titre</th>
                    <th style="width:15%;">Description</th>
                    <th style="width:5%;">Payable</th>
                    <th style="width:5%;">Prix</th>
                    <th style="width:5%;">Recu </th>
                    <th style="width:10%;">Assigné à</th>
                    <th style="width:10%;">Contact</th>
                    <th style="width:10%;">Reglement</th>
                    <th style="width:10%;">Module</th>
                    <th style="width:10%;">Facture</th>
                  </tr>
                  
                  <?php 
                  foreach($entrercaisse as $element){

                    ?>
                    <tr>     
                      <td contentEditable ><?php echo $element["titre"]; ?></td>              
                      <td><div id="myDiv"></div>
                      <script>
                        var obj = <?php echo  json_encode(html_entity_decode($element["description"])); ?>;

                       
                        // Parse the string into a JavaScript array
                              var dataArray = JSON.parse(obj);
                            // Create an HTML table
                              var table = document.createElement('table');
                              // Create table header row
                              var thead = document.createElement('thead');
                              var headerRow = document.createElement('tr');
                              Object.keys(dataArray[0]).forEach(function(key) {
                                var th = document.createElement('th');
                                th.textContent = key;
                                headerRow.appendChild(th);
                              });
                              thead.appendChild(headerRow);
                              table.appendChild(thead);

                              // Create table body
                              var tbody = document.createElement('tbody');
                              dataArray.forEach(function(rowData) {
                                var tr = document.createElement('tr');
                                Object.values(rowData).forEach(function(value) {
                                  var td = document.createElement('td');
                                  td.textContent = value;
                                  tr.appendChild(td);
                                });
                                tbody.appendChild(tr);
                              });
                              table.appendChild(tbody);

                              // Append the table to the document body
                              // document.body.appendChild(table); 
                              // Create a div element reference
                              // var myDiv = document.getElementById('myDiv');

                              // Append the table to the div element
                              // myDiv.appendChild(table);
                              // Get the current location in the document
                                var currentLocation = document.currentScript.parentNode;

                                // Append the table to the current location
                                currentLocation.appendChild(table);
                      </script>
                      </td>                                              
                      <td><?php echo $element["payement"]; ?></td>                                              
                      <td><?php echo $element["prix"]; ?></td> 
                      <td><?php echo $element["recu"]; ?></td>                                              
                      <td><?php echo $element["nameClient"]; ?></td>                                              
                      <td><?php echo $element["phoneClient"]; ?></td>                                              
                      <td><?php echo $element["reglement"]; ?></td>                                              
                      <td><?php echo $element["modulename"]; ?></td>                                              
                      <td>
                      <form method="POST" action="facture.php">
                      <input type="hidden" name="payement" value=<?php echo $element["payement"]; ?>>
                      <input type="hidden" name="titre" value=<?php echo json_encode($element["titre"]); ?>>
                      <input type="hidden" name="descrip" value=<?php echo  json_encode($element["description"]); ?>>
                          <input type="hidden" name="recu" value=<?php echo$element["recu"]; ?>>
                          <input type="hidden" name="prix" value=<?php echo$element["prix"]; ?>>
                          <input type="hidden" name="phoneClient" value=<?php echo json_encode($element["phoneClient"]); ?>>
                          <input type="hidden" name="nameClient" value=<?php echo json_encode($element["nameClient"]); ?>>
                          <input type="hidden" name="reglement" value=<?php echo$element["reglement"]; ?>>
                          <input type="hidden" name="modulename" value=<?php echo$element["modulename"]; ?>>
                          <input type="hidden" name="dateentrer" value=<?php echo$element["dateentrer"]; ?>>
                          
                          <input type="hidden" name="EmailCaisse" value=<?php echo$_SESSION["email"]; ?>>
                          <input type="hidden" name="FullnameCaisse" value=<?php echo$_SESSION["fullname"]; ?>>
                          <input type="hidden" name="TelCaisse" value=<?php echo$_SESSION["tel"]; ?>>
                              <!-- <input type="submit"> -->
                          

                                    <button  type="submit"  value="Submit">Imprimer</button>
                                    </form>
                      </td>                                              
                    </tr>

                    <?php

                  }

                  ?>
                  
                </table>   
          </div>

        </div>
            


                      
      </div>
      <div class="card shadowexempl">
        <h2>Stock Liste</h2>
        <h3>Voulez vous rechercher un article?</h3>
        <input type="text" id="mysearchInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
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
                <h5>Ajout des paiements effectués</h5>

                  <div><form method="POST"  action="apicaisse.php" autocomplete="off"  id="formtable">
                    <div>  
                      <input type="checkbox" id="assignPersonCheckbox"> Assigné à une personne ou une entreprise<br>
                    <div id="personFields" style="display: none;">
                      Nom : <input type="text" id="nameInput" name="nameInput" value="UserNotSpecified"><br>
                      Numéro de téléphone : <input type="text" id="phoneInput" name="phoneInput" value="+0-000-000-000"><br>
                    </div>

                    <br><br>

         

                    


                  <label for="titre"><b>Titre </b></label><input type="text" name="titre" >
                  <label for="artcl"><b> Article </b></label>
                  <div class="caisse" id="aftercaisse"> 

        <!--Make sure the form has the autocomplete function switched off:-->
        <!-- <form autocomplete="off"  id="formtable"> -->
          <div class="caisseautocomplete" style="width:300px;">
            <input id="caissemyInput" type="text" name="myArticle" placeholder="Nom de l'article ici">
          </div>
          <input type="number" name="quantity" id="idqty"  min="1" placeholder="Entrer quantité">
          <input type="hidden" name="nameprix" id="idprix">
          <input type="hidden" name="nametaxe" id="idtaxe">
          <input type="button" onclick="addTableRow()" value="Ajouter">
        <!-- </form> -->
        </div>
        <br>
        <div>
 <h4>Facturation</b></h4>
 
  <table id="tableData" border="1" cellpadding="2">
   <tr>
    <td><b>Article</b></td>
    <td><b>Quantité</b></td>
    <td><b>Prix Unitaire</b></td>
    <td><b>Prix </b></td>
    <td><b>TVA</b></td>
    <td><b>Prix total</b></td>
   </tr>
  </table>

</div><br>                  
                    <label for="prix"><b>Prix Total</b></label><input type="number" id="totalis" name="prix">
                    <label for="recu"><b>Somme Reçu </b></label><input type="number" name="recu" required>
                    

                    </div>
                    <br> <br> 
                    <label for="apayer"><b>Payable </b></label>

                       <select name="apayer">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>

                       </select>
                       <br> <br> 
                    <label for="reglement"><b>Règlement </b></label>
                       <select name="reglement">
                        <option value="cash">Cash</option>
                        <option value="virement">Mobile Money</option>
                        <option value="virement">Virement</option>
                        <option value="visacard">Visa Card</option>
                        <option value="paypal">Pay Pal</option>
                        <option value="assurance">Assurance</option>

                       </select>
                      
                     
                   
                          <label for="module"><b>Module </b></label>

                         <select name="module">

                     <?php
             
               include('../db/config.php');
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
                    
                  </form>
              
              </div>
                  <p>Autres fonctions..</p>
                <p>Le caissière de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>





      </div>
 


  </div>
  <div class="rightcolumn">
  <?php include("../component/profile.php");?>
    <?php include("../component/role.php"); ?>

     <div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
         //dsimagasine\wp-content\uploads\woocommerce_uploads\2023\01
 //dsimagasine/wp-contentuploadswoocommerce_uploads202301
   // include('../db/config.php');
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

<?php include("../component/pieddepage.php"); ?>

<script type="text/javascript" src="../javascript.js"></script>
<script type="text/javascript">
    
document.addEventListener('DOMContentLoaded', function() {
  var assignPersonCheckbox = document.getElementById('assignPersonCheckbox');
  var personFields = document.getElementById('personFields');

  assignPersonCheckbox.addEventListener('change', function() {
    if (assignPersonCheckbox.checked) {
      personFields.style.display = 'block';
    } else {
      personFields.style.display = 'none';
    }
  });
});

      

    let data=[];
    let dataarray=[];
    function addTableRow() {
 var name = document.getElementById("caissemyInput");
 var qtyvar = document.getElementById("idqty").value;
 var prixunitairevar = document.getElementById("idprix").value;
 var taxevar = document.getElementById("idtaxe").value;
 var prixvar = prixunitairevar*qtyvar;
//  alert("prixvar="+prixvar+" taxevar="+taxevar+" prixunitairevar"+prixunitairevar+" taxe="+taxevar);

 var prixtotalvar = ((taxevar/100)*prixvar)+prixvar;
 var table = document.getElementById("tableData");
 var rowCount = table.rows.length;
 var row = table.insertRow(rowCount);
 row.insertCell(0).innerHTML= name.value;
 row.insertCell(1).innerHTML= qtyvar;
 row.insertCell(2).innerHTML= prixunitairevar;
 row.insertCell(3).innerHTML= prixvar;
 row.insertCell(4).innerHTML= taxevar;
 row.insertCell(5).innerHTML= prixtotalvar;
 var sum = 0;

    // Iterate through each row of the table, starting from the second row
    for (var i = 1; i < table.rows.length; i++) {
      // Parse the value in the "Benefice" column and add it to the sum
      sum += parseInt(table.rows[i].cells[5].innerHTML);
    }
    document.getElementById("totalis").value=sum;
    //get the array
     // Initialize an empty array to store the table data
     var dataArray = [];

// Iterate through each row of the table, starting from the second row
for (var i = 1; i < table.rows.length; i++) {
  // Get the cells of the current row
  var cells = table.rows[i].cells;

  // Create an object to store the cell data
  var rowData = {};

  // Iterate through each cell of the row
  var columnName=["Article","Quantité","Prix Unitaire en cfa","Prix en cfa","TVA en %","Prix total en cfa"]
  for (var j = 0; j < cells.length; j++) {
    // Get the cell value and assign it to the corresponding property of the object
    var cellValue = cells[j].innerHTML;
    rowData[columnName[j] + ""] = cellValue;
  }

  // Add the row data object to the array
  dataArray.push(rowData);
}

// Output the array containing the table data
console.log(dataArray);
// Convert the array to a string
var arrayString = JSON.stringify(dataArray);

// Reverse the string
// var reversedString = arrayString.split('').join('');

// console.log(reversedString);
document.getElementById("descriptioninput").value = arrayString;



}
    
    // alert(obj);
</script>
<script>
function myFunction() {
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
     
  }
}




function caisseautocomplete(inp, arr,inpprix, arrprix,inptaxe, arrtaxe) {
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
              inpprix.value = arrprix[arr.indexOf(this.getElementsByTagName("input")[0].value)];
              inptaxe.value = arrtaxe[arr.indexOf(this.getElementsByTagName("input")[0].value)];
              
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
var objarticleprix=[];
var objarticletaxe=[];
    <?php foreach ($stockcmu as $element){ ?>
      var art=<?php echo json_encode($element["designation"]); ?>;
      var artprixvente=<?php echo json_encode($element["prixvente"]); ?>;
      var arttaxe=<?php echo json_encode($element["taxe"]); ?>;
      objarticle.push(art);
      objarticleprix.push(artprixvente);
      objarticletaxe.push(arttaxe);
      
      <?php
    }
      ?>
/*An array containing all the country names in the world:*/
// var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
caisseautocomplete(document.getElementById("caissemyInput"), objarticle,document.getElementById("idprix"),objarticleprix,document.getElementById("idtaxe"),objarticletaxe);
</script>

</body>
</html>

<?php

//  ob_end_flush();
?>